<?php

use App\Models\Appointment;
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

        Route::get('profile', 'profile')->name('profile');
        Route::post('profile', 'profileUpdate')->name('profile.update');

        Route::get('password', 'password')->name('password');
        Route::post('password', 'passwordUpdate')->name('password.update');
    });

    Route::controller('AppointmentController')->name('appointment.')->prefix('appointment/staff')->group(function () {
        // Create appointment
        Route::get('new', 'new')->name('index');
        Route::get('form', 'form')->name('form');
        Route::get('details', 'details')->name('booking.details');
        Route::get('booking/availability/date', 'availability')->name('available.date');
        Route::post('store/data/{id}', 'store')->name('store');

    });
    
    
});
