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

        Route::get('profile', 'profile')->name('profile');
        Route::post('profile', 'profileUpdate')->name('profile.update');

        Route::get('password', 'password')->name('password');
        Route::post('password', 'passwordUpdate')->name('password.update');
    });

    Route::controller('ScheduleController')->name('schedule.')->prefix('schedule')->group(function () {
        Route::get('index', 'index')->name('index');
        Route::post('update', 'update')->name('update');
    });

    Route::controller('AppointmentController')->name('appointment.')->prefix('appointment')->group(function () {
        Route::get('index', 'index')->name('index');
        Route::get('booking', 'booking')->name('booking');
        Route::get('booked/date', 'availability')->name('available.date');
        Route::post('store/{id}', 'store')->name('store');

    
        Route::get('completed', 'appointmentCompleted')->name('completed');
        Route::post('service/done/{id}', 'doneService')->name('done');

        Route::get('trashed', 'serviceTrashed')->name('trashed');
        Route::post('remove/{id}', 'remove')->name('remove');
        
    });
});



