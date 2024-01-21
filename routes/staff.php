<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::namespace('Auth')->group(function () {
    Route::controller('LoginController')->group(function () {
        Route::get('/', 'showLoginForm')->name('login');
        Route::post('/', 'login')->name('login');
        Route::get('-logout', 'logout')->name('logout');
    });
});

Route::middleware('staff')->group(function () {
    Route::controller('StaffController')->group(function () {
        Route::get('dashboard', 'dashboard')->name('dashboard');
    });
});
