<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\User;
use App\Models\Post;
use Illuminate\Http\Request;

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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Company $company)
    {
        //
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
        $search = $request->input('search');

        $users = User::query()
            ->when($search, function ($query, $search) {
                return $query->where(function ($q) use ($search) {
                    $q->where('email', 'LIKE', '%' . $search . '%')
                        ->orWhere('name', 'LIKE', '%' . $search . '%');
                });
            })
            ->get();

        $hrs = User::where('roles', 'hr')->get();
        $posts = Post::latest()->paginate(10);

        return view('dashboard.company', compact('users', 'hrs', 'posts'));
    }
    public function showDashboard()
    {
        // Ambil semua user yang relevan
        $users = User::whereIn('roles', ['applier', 'hr'])->get();
        $hrs = User::where('roles', 'hr')->get();
        $posts = Post::latest()->paginate(10);

        return view('dashboard.company', compact('users', 'hrs', 'posts'));
    }
}
