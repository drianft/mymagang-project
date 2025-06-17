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
        $user = Auth::user();
        $applier = $user->applier;

        $companies = User::with('company')->where('roles', 'company')->take(4)->get();
        $posts = Post::latest()->take(10)->get();
        $latestApplications = Application::with('post.company.user')
            ->where('applier_id', $applier->id) // pake id user login
            ->latest()
            ->take(5)
            ->get();

        return view('dashboard', compact('companies', 'posts', 'latestApplications'));

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

    public function showCompanyDashboard()
    {
        $user = Auth::user();
        $company = $user->company; // Ambil perusahaan yang terkait dengan user

        // Safety check
        if (!$company) {
            abort(404, 'Perusahaan tidak ditemukan untuk user ini.');
        }

        // Ambil post milik perusahaan itu
        $posts = Post::where('company_id', $company->id)->latest()->paginate(10);
        $totalPosts = $posts->total();
        $totalApplicants = Applier::count(); // atau logika lain sesuai kebutuhan

        $applier = User::whereIn('roles', ['applier'])->get();
        $hrs = User::where('roles', 'hr')->get();

        return view('company.dashboard', compact(
            'company',
            'totalPosts',
            'totalApplicants',
            'posts',
            'applier',
            'hrs'
        ));
    }
}
