<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::all(); // ambil semua postingan
        return view('admin.posts', compact('posts'));
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
    public function show(Post $posts)
    {
        $posts = Post::find($posts);
        return view('admin.posts', compact('posts'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(post $posts)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, post $posts)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(post $posts)
    {
        //
    }
}
