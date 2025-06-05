<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;

class PageController extends Controller
{
    public function showJobs()
    {
        $posts = Post::paginate(25);
        return view('jobpost', compact('posts'));
    }

    public function showCompanies()
    {
        $companies = User::with('company')->where('roles', 'company')->paginate(5);
        return view('companylist', compact('companies'));
    }

    public function guestWarning($page)
    {
        return view('guestwarning', ['page' => $page]);
    }

    public function shownewPost()
    {
        $newPosts = Post::latest()->take(10)->get();
        return view('dashboard', compact('newPosts'));
    }
}
