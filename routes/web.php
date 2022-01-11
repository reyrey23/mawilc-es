<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes();

Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home');
Route::get('/student', 'App\Http\Controllers\User\UserController@index')->name('student');

Route::group(['middleware' => 'auth'], function () {
    Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
    Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
    Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
    Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);

    Route::namespace('App\Http\Controllers\Admin')->prefix('admin')->name('admin.')->group(function(){
        Route::resource('user','UserController');
    });

    Route::resource('instructor','App\Http\Controllers\InstructorController');
    Route::get('instructor', ['as' => 'instructor.index', 'uses' => 'App\Http\Controllers\InstructorController@index']);

    Route::resource('subject','App\Http\Controllers\SubjectController');
    Route::get('subject', ['as' => 'subject.index', 'uses' => 'App\Http\Controllers\SubjectController@index']);
    
    Route::namespace('App\Http\Controllers')->prefix('schedule')->name('schedule.')->group(function(){
        Route::resource('subject','SubjectScheduleController');
    });

    Route::namespace('App\Http\Controllers')->prefix('admin')->name('admin.')->group(function(){
        Route::resource('enrollment','StudentEnrolledController');
    });

    Route::resource('class-list','App\Http\Controllers\ClassListController');

    // Student
    Route::namespace('App\Http\Controllers\User')->prefix('student')->name('student.')->group(function(){
        Route::resource('home','HomeController');
    });

    Route::namespace('App\Http\Controllers\User')->prefix('student')->name('student.')->group(function(){
        Route::resource('enrollment','StudentEnrolledController');
    });

    Route::namespace('App\Http\Controllers\User')->prefix('student')->name('student.')->group(function(){
        Route::resource('information','StudentInformationController');
    });
});



