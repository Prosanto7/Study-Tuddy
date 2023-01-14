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

    Route::post('/sendcode', [AuthController::class, 'sendCode']);

    Route::post('/checkcode', [AuthController::class, 'checkCode']);

    Route::get('/forgetpassword', function () {
        return view('auth.forgetpassword');
    });

    Route::get('/entercode/{email}', function ($email) {
        return view('auth.entercode', ['email'=> $email]);
    });

    Route::get('/updatepassword/{email}', function ($email) {
        return view('auth.updatepassword', ['email'=> $email]);
    });

    Route::post('/update', [AuthController::class, 'update']);
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('/logout', [AuthController::class, 'logout']);

    Route::get('/', [ProjectController::class, 'showHome']);

    Route::get('/home', [ProjectController::class, 'showHome']);

    Route::post('/setcompleted', [ProjectController::class, 'setCompleted']);

    Route::get('/subjects', [ProjectController::class, 'showSubjects']);

    Route::post('/addsubject', [ProjectController::class, 'addSubject']);

    Route::post('/deletesubject', [ProjectController::class, 'deleteSubject']);

    Route::post('/addtopic/{subject}', [ProjectController::class, 'addTopic']);

    Route::post('/updatetopic/{subject}', [ProjectController::class, 'updateTopic']);

    Route::post('/deletetopic', [ProjectController::class, 'deleteTopic']);

    Route::get('/subjectsperday', [ProjectController::class, 'showSubjectsPerDay']);

    Route::post('/updatesubjectsperday', [ProjectController::class, 'updateSubjectsPerDay']);

    Route::get('/timeslots', [ProjectController::class, 'showTimeSlots']);

    Route::post('/deletetimeslot', [ProjectController::class, 'deleteTimeSlot']);

    Route::post('/addtimeslot', [ProjectController::class, 'addTimeSlot']);

    Route::get('/progressreport', [ProjectController::class, 'progressReport']);
});



// Route::get('/home', [SiteController::class, 'Home']);

// Route::get('/contact', [SiteController::class, 'Contact']);

// Route::get('/about', [SiteController::class, 'About']);

// Route::get('/name/{namevalue}', [SiteController::class, 'MyName']);

// Route::get('/name/{firstName}/{middleName}/{lastName}', [SiteController::class, 'MyFullName']);