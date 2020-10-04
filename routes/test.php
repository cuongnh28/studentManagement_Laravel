<?php

use Illuminate\Support\Facades\Route;

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
//login
Route::get('login', function () {
    return view('login');
});

Route::post('login', 'App\Http\Controllers\AuthController@login')->name('login');

Route::get('logout', 'App\Http\Controllers\AuthController@logout')->name('logout');

Route::get('list_users', 'App\Http\Controllers\UserController@index')->name('list_users')->middleware('auth');;

//Teacher Home
Route::get('teacher', function(){
    return view('teacher');
})->middleware('auth');

//Student Home
Route::get('student', function(){
    return view('student');
})->middleware('auth');

//Edit Teacher
Route::get('teacher/{id}/edit', 'App\Http\Controllers\TeacherController@edit')->name('teacher/{id}/edit');

//Thuc hien Update
Route::post('teacher/update', 'App\Http\Controllers\TeacherController@update')->name('teacher/update');

//Edit Student
Route::get('student/{id}/edit', 'App\Http\Controllers\StudentController@edit')->name('student/{id}/edit');

//Thuc hien Update
Route::post('student/update', 'App\Http\Controllers\StudentController@update')->name('student/update');

//Delete Student.
Route::get('student/{id}/delete', 'App\Http\Controllers\StudentController@destroy')->name('student/{id}/delete');

//Add Student
Route::get('student/create', 'App\Http\Controllers\StudentController@create')->name('student/create');

//Store Student
Route::post('student/create', 'App\Http\Controllers\StudentController@store')->name('student/create');

//Create Message.
Route::get('message/create', 'App\Http\Controllers\MessageController@create')->name('message/create');

//Create Message.
Route::post('message/{id}/create', 'App\Http\Controllers\MessageController@store')->name('message/create');

