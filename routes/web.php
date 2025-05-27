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

//Menampilkaan halaman dengan total posts yang diinginkan
Route::get('/jobs', function() {
    $posts = Post::paginate(25);
    return view('jobpost', compact('posts'));
})->name('jobs');