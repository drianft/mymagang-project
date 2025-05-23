<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;

Route::get('/', function () {
    return view('welcome');
});



Route::get('/admin', [AdminController::class, 'dashboard'])->name('admin.dashboard');
Route::get('/admin/posts',function () {
    return view('admin.posts');
});

// Route::get('/admin/user', function () {
    //     $users = User::all();
    //     return view('user', compact('users'));
    // });
    // Route::put('/admin/users/{id}/status', [UserController::class, 'updateStatus'])->name('admin.users.updateStatus');
Route::prefix('admin')->name('admin.')->group(function () {
    Route::put('/users/{id}/update-status', [UserController::class, 'updateStatus'])->name('users.updateStatus');
    Route::put('/users/{id}/update-role', [UserController::class, 'updateRole'])->name('users.updateRole');
});

Route::get('/admin/user', [AdminController::class, 'showUsers'])->name('admin.users');
Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
Route::get('/admin/posts', [PostController::class, 'index'])->name('admin.posts');

Route::get('/admin/company', [AdminController::class, 'showCompanys'])->name('admin.companies');

Route::get('/admin/application', [AdminController::class, 'showApplicant'])->name('admin.Application');


// require __DIR__.'/auth.php';




Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
