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
    public function show(Bookmark $bookmark)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Bookmark $bookmark)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Bookmark $bookmark)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bookmark $bookmark)
    {
        //
    }
}

