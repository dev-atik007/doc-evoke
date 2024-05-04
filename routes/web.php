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



Route::get('/', [FrontendController::class, 'templates'])->name('templates');
Route::get('/single-fullwidth-doctor', [FrontendController::class, 'singleDoctor'])->name('single.doctor');






