<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\CompanyController;
use App\Models\Post;

// Halaman Utama
Route::get('/', function () {
    return view('dashboard');
})->name('guestdash');

// Middleware untuk user yang sudah login dan terverifikasi
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        if(Auth::user()->roles === 'admin') {
            [AdminController::class, 'dashboard'];
        }
        else{
        return view('dashboard');}
    })->name('dashboard');
});

Route::get('/warnguest/{page}', function ($page) {
    return view('guestwarning', ['page' => $page]);
})->name('warnguest');

Route::get('/jobs', function() {
    $posts = Post::paginate(5);
    return view('jobpost', compact('posts'));
})->name('jobs');

// Grup Route untuk Admin
Route::prefix('admin')->name('admin.')->group(function () {
    // Dashboard dan Index Admin

    // Manajemen User
    Route::get('/user', [AdminController::class, 'showUsers'])->name('users');
    Route::put('/users/{id}/update-status', [UserController::class, 'updateStatus'])->name('users.updateStatus');
    Route::put('/users/{id}/update-role', [UserController::class, 'updateRole'])->name('users.updateRole');

    // Manajemen Postingan
    Route::get('/posts', [PostController::class, 'index'])->name('posts');
    Route::delete('/posts/{id}', [AdminController::class, 'destroy'])->name('posts.destroy');

    // Data Perusahaan
    Route::get('/companies', [AdminController::class, 'showCompanies'])->name('companies');

    // Data Pelamar
    // Route::get('/application', [AdminController::class, 'showApplicant'])->name('application');
});
