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

    public function guestWarning($page)
    {
        return view('guestwarning', ['page' => $page]);
    }
}
