<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\ProjectController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello', function () {
    return "Hello World";
});


Route::get('/home', [ProjectController::class, 'showHome']);

Route::get('/subjects', [ProjectController::class, 'showSubjects']);

Route::get('/subjectperday', [ProjectController::class, 'showSubjectPerDay']);

Route::get('/timeslots', [ProjectController::class, 'showTimeSlots']);


// Route::get('/home', [SiteController::class, 'Home']);

// Route::get('/contact', [SiteController::class, 'Contact']);

// Route::get('/about', [SiteController::class, 'About']);

// Route::get('/name/{namevalue}', [SiteController::class, 'MyName']);

// Route::get('/name/{firstName}/{middleName}/{lastName}', [SiteController::class, 'MyFullName']);