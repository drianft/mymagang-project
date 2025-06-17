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

class DashboardController extends Controller
{
    public function dashboardRedirect()
    {
        if (Auth::user()->roles === 'admin') {
            return redirect()->route('admin.dashboard');
        }elseif (Auth::user()->roles === 'hr') {
        // Ubah ke route yang kamu mau
        return redirect()->route('hr-dashboard');
        } else {
            return redirect()->route('dashboard.user');
        }
    }

    public function showDashboard()
    {

        $companies = User::with('company')->where('roles', 'company')->take(4)->get();
        $posts = Post::latest()->take(10)->get();
        return view('dashboard', compact('companies','posts'));
    }

    public function showGuestDashboard()
    {
        $companies = User::with('company')->where('roles', 'company')->take(4)->get();
        $posts = Post::latest()->take(10)->get();
        return view('dashboard', compact('companies','posts'));
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

        return view('dashboard', compact('users' , 'posts' , 'postCount', 'userCount', 'companyCount', 'applicationCount'));

    }

    public function showHRDashboard()
    {
        $user = Auth::user();

        if ($user->roles !== 'hr') {
            abort(403, 'Unauthorized.');
        }

        // Ambil semua job yang dimiliki HR yang sedang login
        $userId = Auth::id();
        $jobs = Post::with(['user', 'applications.user'])
            ->where('hr_id', Auth::id())
            ->orderBy('created_at', 'desc')
            ->get();

        $applicantCount = Application::whereHas('post', function($query) use ($userId) {
            $query->where('hr_id', $hrId = Auth::user()->hr->id);
        })->count();
        $acceptedCount = Application::whereHas('post', function($query) use ($userId) {
            $query->where('hr_id', $hrId = Auth::user()->hr->id);
        })->where('application_status', 'Accepted')->count();
        $rejectedCount = Application::whereHas('post', function($query) use ($userId) {
            $query->where('hr_id', $hrId = Auth::user()->hr->id);
        })->where('application_status', 'Rejected')->count();
        $interviewCount = Application::whereHas('post', function($query) use ($userId) {
            $query->where('hr_id', $hrId    = Auth::user()->hr->id);
        })->where('application_status', 'Interview')->count();

        return view('hr.hr-home', compact('jobs' , 'userId', 'applicantCount', 'acceptedCount', 'rejectedCount', 'interviewCount'));
    }

    public function guestWarning($page)
    {
        return view('guestwarning', ['page' => $page]);
    }
}
