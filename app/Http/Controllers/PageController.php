<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use App\Models\User;

class PageController extends Controller
{
    public function showJobs()
    {
        $posts = Post::paginate(25);

        $bookmarkedIds = [];

        if (Auth::check() && Auth::user()->applier) {
            $bookmarkedIds = Auth::user()->applier
                ->bookmarkedPosts()
                ->pluck('posts.id')
                ->toArray();
        }

        return view('jobpost', compact('posts', 'bookmarkedIds'));
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
        $post = Post::with(['company.user', 'hr.user'])->findOrFail($id);

        // Cek apakah user sudah bookmark
        $user = Auth::user();
        $bookmarked = false;

        if ($user && $user->applier) {
            $bookmarked = $user->applier->bookmarkedPosts()->where('post_id', $post->id)->exists();
        }

        return view('detailpost', [
            'post' => $post,
            'bookmarked' => $bookmarked,
        ]);
    }

    public function showCompanyDetail($id)
    {
        $user = User::with('company')
        ->where('roles', 'company')
        ->findOrFail($id);

        return view('companydetail', compact('user'));
    }
}
