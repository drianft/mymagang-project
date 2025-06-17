<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HRController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\PostController;
use App\Http\Middleware\RoleMiddleware;

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

    // Routing dashboard HR
    Route::get('/hr/dashboard', [DashboardController::class, 'showHRDashboard'])->name('hr.index');
});

Route::get('/warnguest/{page}', [PageController::class, 'guestWarning'])->name('warnguest');
Route::get('/jobs', [PageController::class, 'showJobs'])->name('jobs');
Route::get('/jobs/{id}', [PageController::class, 'showJobDetail'])->name('jobs.show');
Route::get('/companies', [PageController::class, 'showCompanies'])->name('companies');
Route::get('/company/{id}', [PageController::class, 'showCompany'])->name('company.show');
Route::get('/application', [ApplicationController::class, 'index'])->name('application');
Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');


// HR Routes
Route::prefix('hr')->middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    RoleMiddleware::class . ':hr'
     // Pastikan hanya HR yang bisa mengakses route ini
])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'showHRDashboard'])->name('hr-home');
    Route::get('/applicants', [HRController::class, 'showApplicants'])->name('hr-dashboard');
    Route::get('/company', [HRController::class, 'showCompany'])->name('company');

    // CRUD Jobs khusus HR
    Route::get('/jobs', [HRController::class, 'jobIndex'])->name('jobs.index');
    Route::get('/jobs/{id}/edit', [HRController::class, 'editJob'])->name('jobs.edit');
    Route::put('/jobs/{id}', [HRController::class, 'updateJob'])->name('jobs.update');
    Route::delete('/jobs/{id}', [HRController::class, 'destroyJob'])->name('jobs.destroy');
    Route::get('/posts', [HRController::class, 'showPost'])->name('hr-posts');

     Route::get('/hr/post/create', [HRController::class, 'JobCreate'])->name('hr-post.create');
    Route::post('/hr/post/store', [HRController::class, 'store'])->name('hr-post.store');

    Route::get('/hr/post/{id}/edit', [HRController::class, 'editPost'])->name('hr-post.edit');
    Route::put('/hr/post/{id}', [HRController::class, 'updatePost'])->name('hr-post.update');
});

Route::get('/application/{id}', [ApplicationController::class, 'show'])->name('application.show');
Route::put('/application/{id}', [ApplicationController::class, 'update'])->name('application.update');


