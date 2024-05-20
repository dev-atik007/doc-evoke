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


Route::middleware('assistant')->group(function () {
    Route::controller('AssistantController')->group(function () {
        Route::get('/dashboard', 'dashboard')->name('dashboard');

        Route::get('profile', 'profile')->name('profile');
        Route::post('profile', 'profileUpdate')->name('profile.update');

        Route::get('password', 'password')->name('password');
        Route::post('password', 'updatePassword')->name('password.update');
    });

    Route::controller('AppointmentController')->name('doctor.appointment.')->prefix('doctor/appointment')->group(function () {
        // create appointment
        Route::get('index', 'index')->name('index');
        Route::get('form', 'createFrom')->name('create.form');
        Route::get('details', 'details')->name('booking.details');
        Route::get('booking/availability/date', 'availability')->name('available.date');
        Route::post('store/data/{id}', 'store')->name('store');
        Route::get('new/{id}', 'newAppointment')->name('new');


        Route::post('dealing/{id}', 'done')->name('dealing');
        Route::get('doctor/appointment/completed/{id}', 'appointmentCompleted')->name('completed');
        Route::post('service/done/{id}', 'doneService')->name('done');
        


    });


});
