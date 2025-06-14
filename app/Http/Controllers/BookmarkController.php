<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Applier;

class BookmarkController extends Controller
{
    public function index()
    {
        /** @var \App\Models\Applier $applier */
        $applier = auth()->guard('applier')->user();

        if (!$applier) {
            return redirect()->route('login') // ganti ke login applier kalo ada
                ->with('error', 'Kamu belum login sebagai applier');
        }

        // Ambil semua post yang sudah dibookmark oleh applier
        $bookmarkedPosts = $applier->bookmarks()->latest()->paginate(8);

        return view('bookmarks.index', compact('bookmarkedPosts'));
    }

}

