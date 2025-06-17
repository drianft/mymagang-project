<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\Bookmark;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Models\Applier;
use App\Models\Company;
use App\Models\Application;
use App\Models\CompanyAdmin;

class DashboardController extends Controller
{
    public function dashboardRedirect()
    {
        if (Auth::user()->roles === 'admin') {
            return redirect()->route('admin.dashboard');
        } elseif (Auth::user()->roles === "company") {
            return redirect()->route('company.dashboard');
        } else {
            return redirect()->route('dashboard.user');
        }
    }

    public function showDashboard()
    {

        $companies = User::with('company')->where('roles', 'company')->take(4)->get();
        $posts = Post::latest()->take(10)->get();
        return view('dashboard', compact('companies', 'posts'));
    }

    public function showGuestDashboard()
    {
        $companies = User::with('company')->where('roles', 'company')->take(4)->get();
        $posts = Post::latest()->take(10)->get();
        return view('dashboard', compact('companies', 'posts'));
    }

    public function showAdminDashboard(Request $request)
    {
        $search = $request->input('search');

        $users = User::query()
            ->when($search, function ($query, $search) {
                $query->where('fullName', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%");
            })
            ->get();
        $posts = Post::all(); // ambil 5 postingan terbaru

        $postCount = Post::count();
        $userCount = User::count();
        $companyCount = Company::count();
        $applicationCount = Application::count();


        $companies = Company::all(); // ambil semua data company dari database

        return view('dashboard', compact('users', 'posts', 'postCount', 'userCount', 'companyCount', 'applicationCount'));
    }

    public function guestWarning($page)
    {
        return view('guestwarning', ['page' => $page]);
    }


    public function storeAdmin(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:company_admins,email',
            'position' => 'nullable|string|max:255',
            'status' => 'required|in:active,inactive',
        ]);

        CompanyAdmin::create($validated);

        return response()->json(['success' => true]);
    }

    public function showCompanyDashboard()
    {
        $companyName = Auth::user()->fullName ?? 'Company Name';

        // Temukan company milik user login
        $company = Company::where('user_id', Auth::id())->first();

        // Safety check
        if (!$company) {
            abort(404, 'Perusahaan tidak ditemukan untuk user ini.');
        }

        // Ambil post milik perusahaan itu
        $posts = Post::where('company_id', $company->id)->latest()->paginate(10);
        $totalPosts = $posts->total();
        $totalApplicants = Applier::count(); // atau logika lain sesuai kebutuhan

        $users = User::whereIn('roles', ['applier'])->get();
        $hrs = User::where('roles', 'hr')->get();
        $admins = CompanyAdmin::all();

        return view('company.dashboard', compact(
            'companyName',
            'company',
            'totalPosts',
            'totalApplicants',
            'posts',
            'admins',
            'users',
            'hrs'
        ));
    }


}
