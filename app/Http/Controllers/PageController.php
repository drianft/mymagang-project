<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use App\Models\User;

class PageController extends Controller
{
    public function showJobs(Request $request)
    {
        $query = Post::query();

        // Search filter
        if ($request->has('search') && $request->search !== '') {
            $query->where('job_title', 'like', '%' . $request->search . '%');
        }

        $posts = $query->paginate(25);

        // Ambil bookmark ID
        $bookmarkedIds = [];
        if (Auth::check() && Auth::user()->applier) {
            $bookmarkedIds = Auth::user()->applier
                ->bookmarkedPosts()
                ->pluck('posts.id')
                ->toArray();
        }

        // AJAX response buat isi ulang job grid doang
        if ($request->ajax()) {
            return view('jobs.partials.job_grid', compact('posts', 'bookmarkedIds'))->render();
        }

        // Full page load
        return view('jobpost', compact('posts', 'bookmarkedIds'));
    }

    public function showCompanies(Request $request)
    {
        $query = User::where('roles', 'company');

        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        $companies = $query->paginate(20);

        if ($request->ajax()) {
            return view('companies.partials.company_grid', compact('companies'))->render();
        }

        return view('companylist', compact('companies'));
    }

    public function guestWarning($page)
    {
        return view('guestwarning', ['page' => $page]);
    }


    public function showJobDetail($id)
    {
        $post = Post::with(['company', 'hr'])->findOrFail($id);

        // Cek apakah user sudah bookmark
        $user = Auth::user();
        $bookmarked = false;

        if ($user && $user->applier) {
            $bookmarked = $user->applier->bookmarkedPosts()->where('post_id', $post->id)->exists();
        }

        return view('detailpost', [
            'post' => $post,
            'bookmarked' => $bookmarked,
            'user' => $user,
        ]);
    }

    public function showCompanyDetail($id)
    {
        $user = User::with('company')
        ->where('roles', 'company')
        ->findOrFail($id);

        return view('companydetail', compact('user'));
    }

    public function showCompanyJobs(Request $request)
    {
        // Ambil user yang lagi login
        $user = Auth::user();

        // Pastikan usernya role 'company'
        if ($user->roles !== 'company') {
            abort(403, 'Unauthorized action.');
        }

        // Ambil semua jobs yang punya company_id sesuai dengan user login
        $jobs = Post::where('company_id', $user->company->id)->get();

        // Kirim datanya ke view
        return view('company.jobs', compact('jobs'));
    }
}
