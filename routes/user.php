<?php

use Illuminate\Support\Facades\Route;


Route::namespace('Auth')->group(function () {
    Route::controller('LoginController')->group(function() {
        Route::get('/', 'showLoginForm')->name('login');
        Route::post('/', 'login')->name('login');
        Route::get('-logout', 'logout')->name('logout');
    });
});



Route::middleware('user')->group(function () {
    Route::controller('UserController')->group(function () {
        Route::get('dashboard', 'dashboard')->name('dashboard');
    });
});

