<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\AuthController;

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

Route::get('/welcome', function () {
    return view('welcome');
});

// Route::get('/hello', function () {
//     return "Hello World";
// });

Route::group(['middleware' => 'guest'], function () {
    Route::get('/', [AuthController::class, 'login_view'])->name('login');

    Route::get('/login', [AuthController::class, 'login_view'])->name('login');

    Route::post('/login', [AuthController::class, 'login'])->name('login');

    Route::get('/register', [AuthController::class, 'register_view']);

    Route::post('/register', [AuthController::class, 'register']);
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('/logout', [AuthController::class, 'logout']);

    Route::get('/', [ProjectController::class, 'showHome']);

    Route::get('/home', [ProjectController::class, 'showHome']);

    Route::get('/subjects', [ProjectController::class, 'showSubjects']);

    Route::get('/subjectsperday', [ProjectController::class, 'showSubjectsPerDay']);

    Route::post('/updatesubjectsperday', [ProjectController::class, 'updateSubjectsPerDay']);

    Route::get('/timeslots', [ProjectController::class, 'showTimeSlots']);

    Route::post('/deletetimeslot', [ProjectController::class, 'deleteTimeSlot']);

    Route::post('/addtimeslot', [ProjectController::class, 'addTimeSlot']);
});



// Route::get('/home', [SiteController::class, 'Home']);

// Route::get('/contact', [SiteController::class, 'Contact']);

// Route::get('/about', [SiteController::class, 'About']);

// Route::get('/name/{namevalue}', [SiteController::class, 'MyName']);

// Route::get('/name/{firstName}/{middleName}/{lastName}', [SiteController::class, 'MyFullName']);