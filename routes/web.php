<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Route::get('/admin/user', function () {
//     $users = User::all();
//     return view('user', compact('users'));
// });
Route::get('/admin/user', [AdminController::class, 'showUsers'])->name('admin.users');
// Route::put('/admin/users/{id}/status', [UserController::class, 'updateStatus'])->name('admin.users.updateStatus');
Route::prefix('admin')->name('admin.')->group(function () {
    Route::put('/users/{id}/update-status', [UserController::class, 'updateStatus'])->name('users.updateStatus');
    Route::put('/users/{id}/update-role', [UserController::class, 'updateRole'])->name('users.updateRole');
});

Route::get('/admin/company', [AdminController::class, 'showCompanys'])->name('admin.companies');

Route::get('/admin/application', [AdminController::class, 'showApplicant'])->name('admin.Application');


require __DIR__.'/auth.php';
