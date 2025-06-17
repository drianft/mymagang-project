<?php

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PostController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BookmarkController;

Route::get('/', [DashboardController::class, 'showGuestDashboard'])->name('guestdash');

// Middleware untuk user yang sudah login dan terverifikasi
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    // Routing dashboard yang ngecek role
    Route::get('/dashboard', [DashboardController::class, 'dashboardRedirect'])->name('dashboard');

    // Routing dashboard user biasa
    Route::get('/dashboard/user', [DashboardController::class, 'showDashboard'])->name('dashboard.user');

    // Routing dashboard admin
    Route::get('/admin/dashboard', [DashboardController::class, 'showAdminDashboard'])->name('admin.dashboard');
});

Route::get('/warnguest/{page}', [PageController::class, 'guestWarning'])->name('warnguest');
Route::get('/jobs', [PageController::class, 'showJobs'])->name('jobs');
Route::get('/jobs/{id}', [PageController::class, 'showJobDetail'])->name('jobs.show');
Route::get('/companies', [PageController::class, 'showCompanies'])->name('companies');
Route::get('/company/{id}', [PageController::class, 'showCompanyDetail'])->name('company.show');
Route::middleware(['auth'])->group(function () {
    Route::post('/apply/{post}', [ApplicationController::class, 'apply'])->name('applications.apply');
    Route::get('/my-applications', [ApplicationController::class, 'myApplications'])->name('applications.mine');
});
Route::middleware(['auth'])->group(function () {
    Route::get('/bookmarks', [BookmarkController::class, 'view'])->name('bookmarks.view');
    Route::post('/bookmarks/toggle', [BookmarkController::class, 'toggle'])->name('bookmarks.toggle');
});


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
    Route::get('/application', [AdminController::class, 'showApplicant'])->name('application');
});
