<?php

namespace App\Http\Controllers;

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class BookmarkController extends Controller
{
    public function view()
    {
        $applier = Auth::user()->applier;
        $bookmarkedPosts = $applier->bookmarkedPosts()->with('company')->get();

        return view('bookmarks.index', compact('bookmarkedPosts'));
    }

    public function index()
    {
        $applier = Auth::user()->applier;
        $bookmarks = $applier->bookmarkedPosts()->with('company')->get();

        return response()->json($bookmarks);
    }

    public function store(Request $request)
    {
        $request->validate(['post_id' => 'required|exists:posts,id']);
        $applier = Auth::user()->applier;

        $exists = $applier->bookmarkedPosts()->where('post_id', $request->post_id)->exists();
        if ($exists) {
            return response()->json(['message' => 'Already bookmarked'], 409);
        }

        $applier->bookmarkedPosts()->attach($request->post_id, ['saved_at' => now()]);
        return response()->json(['message' => 'Bookmark added']);
    }

    public function deleteBookmarkByPostId($postId)
    {
        $applier = Auth::user()->applier;
        $applier->bookmarkedPosts()->detach($postId);

        return response()->json(['message' => 'Bookmark removed']);
    }

    public function toggle(Request $request)
    {
        $request->validate(['post_id' => 'required|exists:posts,id']);

        $applier = Auth::user()->applier;
        $postId = $request->post_id;

        $exists = $applier->bookmarkedPosts()->where('post_id', $postId)->exists();

        if ($exists) {
            $applier->bookmarkedPosts()->detach($postId);
            $status = 'removed';
        } else {
            $applier->bookmarkedPosts()->attach($postId, ['saved_at' => now()]);
            $status = 'added';
        }

        return response()->json(['status' => $status]);
    }

    public function show($id)
    {
        $post = Post::with(['company', 'hr.user'])->findOrFail($id);
        $applier = Auth::user()->applier;
        $bookmarked = $applier->bookmarkedPosts()->where('post_id', $id)->exists();

        return view('jobs.show', compact('post', 'bookmarked'));
    }
}