<?php

use Illuminate\Support\Facades\Route;
use App\Models\Post;

Route::get('/', function () {
    return view('dashboard');
})->name('guestdash');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/warnguest/{page}', function ($page) {
    return view('guestwarning', ['page' => $page]);
})->name('warnguest');

Route::get('/jobs', function() {
    $posts = Post::paginate(5);
    return view('jobpost', compact('posts'));
})->name('jobs');