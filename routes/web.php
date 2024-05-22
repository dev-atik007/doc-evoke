<?php

use App\Http\Controllers\Admin\FrontendController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
|   Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by ""web"" the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
|
*/


// Landing page
Route::get('/', [FrontendController::class, 'templates'])->name('templates');


Route::get('/single-fullwidth-doctor', [FrontendController::class, 'singleDoctor'])->name('single.doctor');


Route::controller('Admin\SiteController')->group(function() {
    //Subscirbe
    Route::get('subscribe', 'subscribe')->name('subscribe');
    Route::post('user-subscribe', 'userSubscribe')->name('user.subscribe');

    //footer section
    Route::get('footer-details', 'info')->name('footer.info');
    Route::post('footer.section/{id}', 'footerSection')->name('footer.section');
    
    // forms Contact
    Route::get('contact-form', 'index')->name('contact.index');
    Route::post('contactdata/user', 'contactFormUser')->name('form.contact.user');
    Route::get('contact-data-delete/{id}', 'delete')->name('data.delete');

    //Google Map
    Route::post('google-map', 'map')->name('google.map');

    // All Sections descriptions
    Route::get('section-all', 'description')->name('description');
    Route::post('section-description/update/{id}', 'sectionUpdate')->name('section.update');

    Route::get('doctor-image', 'image')->name('doctor.image');

    // Testimonials Section
    Route::get('testimonials', 'testimonials')->name('testimonials');
    Route::get('testinations', 'testinationForm')->name('testination.form');
    Route::post('testination/store/{id?}', 'store')->name('destination.store');
    Route::post('/testimonials/update/{id}', 'testimonialsUpdate')->name('testimonials.update');
    Route::get('testimonials/delete/{id}', 'testimonialsDelete')->name('testimonials.delete');
});
