<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\JobsController;
use App\Http\Controllers\HRHomeController;
use App\Http\Controllers\HRDashboardController;
use App\Http\Controllers\HRPostController;



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
    
    Route::get('/applicants', function () {
        return view('applicants');
    })->name('applicants');
    
    Route::get('/company', [CompanyController::class, 'index'])->name('company');
    Route::get('/jobs', [JobsController::class, 'index'])->name('jobs');
    Route::get('/jobs/search', [JobsController::class, 'search'])->name('jobs.search');
    Route::get('/hr-home', [HRHomeController::class, 'index'])->name('hr-home');
    Route::get('/hr-dashboard', [HRDashboardController::class, 'index'])->name('hr-dashboard');
    Route::get('/hr-posts', [HRPostController::class, 'index'])->name('hr-posts');
    