<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Models\Post;

use App\Http\Controllers\PageController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;

use App\Http\Controllers\BookmarkController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\HRController;
use App\Http\Controllers\InterviewController;
use App\Http\Middleware\RoleMiddleware;

use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;


Route::get('/', [DashboardController::class, 'showGuestDashboard'])->name('guestdash');

// Middleware untuk user yang sudah login dan terverifikasi
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {

    // Redirect sesuai role
    Route::get('/dashboard', [DashboardController::class, 'dashboardRedirect'])->name('dashboard');

    // Dashboard untuk user biasa
    Route::get('/dashboard/user', [DashboardController::class, 'showDashboard'])->name('dashboard.user');

    // Dashboard untuk admin
    Route::get('/admin/dashboard', [DashboardController::class, 'showAdminDashboard'])->name('admin.dashboard');

    // Dashboard untuk company (pakai .home biar sesuai dengan Blade view)
    Route::get('/company/jobs', [CompanyController::class, 'showJobs'])->name('company.jobs');

    //Dashboard untuk Hr
    Route::get('/hr/dashboard', [DashboardController::class, 'showHrDashboard'])->name('hr.index');
});

// Halaman guest dan public
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
    Route::get('/bookmarked/search', [BookmarkController::class, 'search'])->name('bookmarked.search');
});


// Grup Route untuk Admin

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/userAdmin', [AdminController::class, 'showUsers'])->name('users.main');
    Route::put('/users/{id}/update-status', [UserController::class, 'updateStatus'])->name('users.updateStatus');
    Route::put('/users/{id}/update-role', [UserController::class, 'updateRole'])->name('users.updateRole');

    Route::get('/posts', [PostController::class, 'index'])->name('posts');
    Route::delete('/posts/{id}', [AdminController::class, 'destroy'])->name('posts.destroy');

    Route::get('/companies', [AdminController::class, 'showCompanies'])->name('companies');
    Route::get('/application', [AdminController::class, 'showApplicant'])->name('application');
});

// Routing khusus perusahaan
Route::get('/company-dashboard', [DashboardController::class, 'showCompanyDashboard'])->name('company.dashboard');
Route::put('/users/{id}/update-role', [UserController::class, 'updateRole'])->name('admin.users.updateRole');
Route::get('/companyjobs', [PageController::class, 'showCompanyJobs'])->name('posts.show');
Route::post('/company-admins', [DashboardController::class, 'storeAdmin'])->name('company-admins.store');
Route::put('/admin/hr/{id}/demote', [CompanyController::class, 'demoteHrToApplier'])->name('admin.hr.demote');
Route::get('/admin/user', [CompanyController::class, 'searchUsers'])->name('admin.users');
Route::put('/users/{id}/update-role', [UserController::class, 'updateRole'])->name('admin.users.updateRole');
Route::post('/company/hr/store', [CompanyController::class, 'storeHR'])->name('company.storeHR');
Route::put('/company/users/update-role/{id}', [CompanyController::class, 'updateUserRole'])->name('company.users.updateRole');


// HR Routes
Route::prefix('hr')->middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    RoleMiddleware::class . ':hr'
     // Pastikan hanya HR yang bisa mengakses route ini
])->group(function () {
    Route::get('/applicants', [HRController::class, 'showApplicants'])->name('hr-dashboard');
    Route::get('/company', [HRController::class, 'showCompany'])->name('company');

    // CRUD Jobs khusus HR
    Route::get('/jobs', [HRController::class, 'jobIndex'])->name('jobs.index');
    Route::get('/hr/post/{id}/edit', [HRController::class, 'editPost'])->name('hr-post.edit');
    Route::put('/hr/post/{id}', [HRController::class, 'updatePost'])->name('hr-post.update');
    Route::delete('/jobs/{id}', [HRController::class, 'destroyJob'])->name('jobs.destroy');
    Route::get('/posts', [HRController::class, 'showPost'])->name('hr-posts');

    Route::get('/hr/post/create', [HRController::class, 'JobCreate'])->name('hr-post.create');
    Route::post('/hr/post/store', [HRController::class, 'store'])->name('hr-post.store');




    // routes/web.php
    Route::post('/interview/set/{application}', [InterviewController::class, 'store'])->name('interview.store');


});

Route::get('/application/{id}', [ApplicationController::class, 'show'])->name('application.show');
Route::put('/application/{id}', [ApplicationController::class, 'updateHr'])->name('application.update');
