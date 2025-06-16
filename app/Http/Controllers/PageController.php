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
        $companies = User::with('company')->where('roles', 'company')->paginate(8);
        return view('companylist', compact('companies'));
    }

    public function guestWarning($page)
    {
        return view('guestwarning', ['page' => $page]);
    }


    public function showJobDetail($id)
    {
        $post = Post::findOrFail($id);
        return view('detailpost', compact('post'));
    }

    public function showCompanyDetail($id)
    {
        $user = User::with('company')
        ->where('roles', 'company')
        ->findOrFail($id);

        return view('companydetail', compact('user'));
    }
}
