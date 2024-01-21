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


Route::middleware('admin')->group(function () {
    Route::controller('AdminController')->group(function () {
        Route::get('dashboard', 'dashboard')->name('dashboard');
    });
});



// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');