<?php

use App\Http\Controllers\Admin\FrontendController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::namespace('Auth')->group(function () {
    Route::controller('LoginController')->group(function () {
        Route::get('/', 'showLoginForm')->name('login');
        Route::post('/', 'login')->name('login');
        Route::get('-logout', 'logout')->name('logout');
    });

    Route::controller('ForgotPasswordController')->prefix('password')->name('password.')->group(function () {
        Route::get('reset', 'showLinkRequestForm')->name('reset');
        Route::post('reset', 'sendResetCodeEmail');
        Route::get('code-verify', 'codeVerify')->name('code.verify');
        Route::post('verify-code', 'verifyCode')->name('verify.code');
    });

    Route::controller('ResetPasswordController')->group(function () {
        Route::get('password/reset/{token}', 'showResetForm')->name('password.reset.form');
        Route::post('password/reset/change', 'reset')->name('password.change');
    });
});


Route::middleware('admin')->group(function () {
    Route::controller('AdminController')->group(function () {
        Route::get('dashboard', 'dashboard')->name('dashboard');
        Route::get('profile', 'profile')->name('profile');
        Route::post('profile', 'profileUpdate')->name('profile.update');
        Route::get('password', 'password')->name('password');
        Route::post('password', 'passwordUpdate')->name('password.update');
    });

    //Department And Location
    Route::controller('DepartmentController')->prefix('department')->name('department.')->group(function () {
        Route::get('index', 'index')->name('index');
        Route::post('store/{id?}', 'store')->name('store');
        
        Route::get('location', 'location')->name('location');
        Route::post('location/store/{id?}', 'locationStore')->name('location.store');
    });

    // Doctor Manage
    Route::controller('ManageDoctorsController')->prefix('doctor')->name('doctor.')->group(function () {
        Route::get('index', 'index')->name('index');
        Route::get('active', 'active')->name('active');
        Route::get('inactive', 'inactive')->name('inactive');
        

        Route::post('status/{id}', 'status')->name('status');
        Route::post('featured/{id}', 'featured')->name('featured');

        Route::get('form', 'form')->name('form');
        Route::post('store/{id?}', 'store')->name('store');
        Route::get('detail/{id}', 'detail')->name('detail');
    });

    Route::controller('GeneralSettingController')->group(function () {
        // General Setting
        Route::get('general-setting', 'index')->name('setting.index');
        Route::post('general-setting', 'update')->name('setting.update');
    });

    // Assistant Manage
    Route::controller('ManageAssistantsController')->prefix('assistant')->name('assistant.')->group(function () {
        Route::get('index', 'index')->name('index');
        Route::get('active', 'active')->name('active');
        Route::get('inactive', 'inactive')->name('inactive');

        Route::post('status/{id}', 'status')->name('status');
        Route::get('form', 'form')->name('form');
        Route::post('store/{id?}', 'store')->name('store');
        Route::get('detail/{id}', 'detail')->name('detail');
    });

    // Staff Manage
    Route::controller('ManageStaffsController')->prefix('staff')->name('staff.')->group(function () {
        Route::get('index', 'index')->name('index');
        Route::get('active', 'active')->name('active');
        Route::get('inactive', 'inactive')->name('inactive');

        Route::post('status/{id}', 'status')->name('status');
        Route::get('form', 'form')->name('form');
        Route::post('store/{id?}', 'store')->name('store');
        Route::get('detail/{id}', 'detail')->name('detail');
    });

    Route::controller('AppointmentController')->prefix('appointment')->name('appointment.')->group(function (){
        Route::get('index', 'index')->name('index');

        Route::get('form', 'form')->name('form');

        Route::get('details', 'details')->name('book.details');

        Route::get('booked/date', 'availability')->name('available.date');

        Route::post('store/{id}', 'store')->name('store');

    });

    // Frontend
    // Route::name('frontend.')->prefix('frontend')->group(function () {
        
    //     Route::controller('FrontendController')->group(function () {
    //         Route::get('templates', 'templates')->name('templates');
    //     });
    // });


});
