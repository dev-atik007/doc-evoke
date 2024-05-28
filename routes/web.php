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

Route::controller('Admin\FrontendController')->group(function() {
    //Frequently Section
    Route::get('frequentily/index', 'frequently')->name('frequently.index');
    Route::post('frequently/store/', 'frequentlyStore')->name('frequently.store');
    Route::post('frequently/update/{id}', 'frequentlyUpdate')->name('frequently.update');

    //Why choose section
    Route::post('why-choose/update/{id}', 'chooseUpdate')->name('choose.update');
    Route::get('why-choose/index', 'index')->name('why.choose');
    Route::get('why-choose/form', 'chooseForm')->name('choose.form');
    Route::post('why-choose/store/{id?}', 'store')->name('choose.store');
    Route::get('why-choose/edit/{id}', 'chooseEdit')->name('choose.edit');

    //About Section
    Route::post('about-section/update/{id}', 'aboutUpdate')->name('about.update');
    Route::get('about-section/index', 'aboutIndex')->name('about.section');
    Route::get('about-section/form', 'aboutForm')->name('about.form');
    Route::post('about-section/store/{id?}', 'aboutStore')->name('about.store');
    Route::get('about-section/edit/{id}', 'aboutEdit')->name('about.edit');
    Route::get('about-section/delete/{id}', 'aboutDelete')->name('about.delete');
    
});