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



Route::middleware('doctor')->group(function () {
    Route::controller('DoctorController')->group(function () {
        Route::get('dashboard', 'dashboard')->name('dashboard');
    });
});

Route::controller('ScheduleController')->name('schedule.')->prefix('schedule')->group(function () {
    Route::get('index', 'index')->name('index');
    Route::post('update', 'update')->name('update');
});
