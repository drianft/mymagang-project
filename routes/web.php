<?php

use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PostController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

Route::get('/', [DashboardController::class, 'showGuestDashboard'])->name('guestdash');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'showDashboard'])->name('dashboard');
});

Route::get('/warnguest/{page}', [PageController::class, 'guestWarning'])->name('warnguest');
Route::get('/jobs', [PageController::class, 'showJobs'])->name('jobs');
Route::get('/jobs/{id}', [PageController::class, 'showJobDetail'])->name('jobs.show');
Route::get('/companies', [PageController::class, 'showCompanies'])->name('companies');
Route::get('/company/{id}', [PageController::class, 'showCompany'])->name('company.show');
Route::get('/application', [ApplicationController::class, 'index'])->name('application');
Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');