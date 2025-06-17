<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use App\Models\Company;
use App\Models\User;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Applier;
use App\Models\CompanyAdmin;
use App\Models\Application;
use App\Models\hr;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function storeHR(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $company = Company::where('user_id', Auth::id())->first();

        if (!$company) {
            return redirect()->back()->with('error', 'Perusahaan tidak ditemukan.');
        }

        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'roles' => 'hr',
            'company_id' => $company->id,
            'status' => 'active',
        ]);

        return redirect()->back()->with('success', 'HR berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */

    public function showJobs()
    {
        $company = Company::where('user_id', Auth::id())->firstOrFail();
        $posts = Post::where('company_id', $company->id)->latest()->paginate(10);

        return view('company.jobs', compact('posts'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Company $company)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Company $company)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */

    public function demoteHrToApplier($id)
    {
        $user = User::findOrFail($id);

        if ($user->roles === 'hr') {
            $user->roles = 'applier';
            $user->save();
            return back()->with('success', 'HR berhasil diubah menjadi Applier.');
        }

        return back()->with('error', 'User bukan HR.');
    }

    public function searchUsers(Request $request)
    {
        $company = Company::where('user_id', Auth::id())->first();
        $search = $request->input('search');

        $users = User::query()
            ->where('company_id', $company->id)
            ->when($search, function ($query, $search) {
                return $query->where(function ($q) use ($search) {
                    $q->where('email', 'LIKE', '%' . $search . '%')
                        ->orWhere('name', 'LIKE', '%' . $search . '%');
                });
            })
            ->get();

        $hrs = User::where('roles', 'hr')
            ->where('company_id', $company->id)
            ->get();

        $posts = Post::where('company_id', $company->id)->latest()->paginate(10);

        return view('company.dashboard', compact('users', 'hrs', 'posts'));
    }

    public function showDashboard()
    {
        $company = Company::where('user_id', Auth::id())->first();

        $hrs = User::where('roles', 'hr')
            ->where('company_id', $company->id)
            ->get();

        $applier = User::where(function ($q) use ($company) {
            $q->where('roles', 'applier')
                ->orWhere(function ($q2) {
                    $q2->where('roles', 'hr')->whereNull('company_id');
                });
        })->get();

        $posts = Post::where('company_id', $company->id)->latest()->paginate(10);

        return view('company.dashboard', compact('hrs', 'applier', 'posts', 'company'));
    }



    public function showCompanyHome()
    {
        $user = Auth::user();
        return view('company.home', compact('user'));
    }

    public function updateUserRole(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $newRole = $request->input('roles');

        $company = Company::where('user_id', Auth::id())->first();

        if (!$company) {
            return back()->with('error', 'Perusahaan tidak ditemukan.');
        }

        if ($newRole === 'hr') {
            // Update ke users table
            $user->roles = 'hr';
            $user->save();

            // Simpan ke tabel hrs jika belum ada
            Hr::updateOrCreate(
                ['user_id' => $user->id],
                [
                    'company_id' => $company->id,
                    'position' => 'HR' // atau bisa dari request nanti
                ]
            );

            return back()->with('success', 'User berhasil dijadikan HR untuk perusahaan Anda.');
        }

        if ($newRole === 'applier') {
            $user->roles = 'applier';
            $user->save();

            // Hapus dari tabel hrs
            Hr::where('user_id', $user->id)->delete();

            return back()->with('success', 'User dikembalikan menjadi Applier.');
        }

        return back()->with('error', 'Role tidak dikenali.');
    }   
}
