<?php

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Post;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PostController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;

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

    // Routing dashboard company
    Route::get('/company/dashboard', [DashboardController::class, 'showCompanyDashboard'])->name('dashboard.company');
});

Route::get('/warnguest/{page}', [PageController::class, 'guestWarning'])->name('warnguest');
Route::get('/jobs', [PageController::class, 'showJobs'])->name('jobs');
Route::get('/jobs/{id}', [PageController::class, 'showJobDetail'])->name('jobs.show');
Route::get('/companies', [PageController::class, 'showCompanies'])->name('companies');
Route::get('/company/{id}', [PageController::class, 'showCompanyDetail'])->name('company.show');
Route::get('/application', [ApplicationController::class, 'index'])->name('application');
Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');


Route::prefix('company')->name('company.')->group(function () {

  Route::get('/company', function () {
    return view('dashboard.homeCompany');
  }) ;

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

//dashboard company
Route::get('/company-dashboard', [DashboardController::class, 'showCompanyDashboard'])->name('dashboard.homeCompany');
Route::get('/companyjobs', [PageController::class, 'showJobs'])->name('companyjobs');
Route::post('/company-admins', [DashboardController::class, 'storeAdmin'])->name('company-admins.store');
Route::get('/company-dashboard', [DashboardController::class, 'companyDashboard']);
Route::put('/admin/hr/{id}/demote', [CompanyController::class, 'demoteHrToApplier'])->name('admin.hr.demote');
Route::get('/admin/user', [CompanyController::class, 'searchUsers'])->name('admin.users');
// Route::get('/company-dashboard', [CompanyController::class, 'showDashboard'])->name('dashboard.company');


// Route::get('/companyjobs/{id}', [PageController::class, 'showJobDetail'])->name('companyjobs.show');
