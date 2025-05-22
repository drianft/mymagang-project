<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyController;

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
