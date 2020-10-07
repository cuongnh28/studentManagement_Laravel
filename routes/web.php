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

Route::get('list_users', 'App\Http\Controllers\UserController@index')->name('listUsers')->middleware('auth');;

//Trang chu
Route::get('home', function(){
    return view('home');
})->middleware('auth');

//Edit Teacher
Route::get('teacher/{id}/edit', 'App\Http\Controllers\TeacherController@edit')->name('editTeacher');

//Thuc hien Update
Route::post('teacher/update', 'App\Http\Controllers\TeacherController@update')->name('updateTeacher');

//Edit Student
Route::get('student/{id}/edit', 'App\Http\Controllers\StudentController@edit')->name('editStudent');

//Thuc hien Update
Route::post('student/update', 'App\Http\Controllers\StudentController@update')->name('updateStudent');

//Delete Student.
Route::get('student/{id}/delete', 'App\Http\Controllers\StudentController@destroy')->name('deleteStudent');

//Add Student
Route::get('student/create', 'App\Http\Controllers\StudentController@create')->name('createStudent');

//Store Student
Route::post('student/create', 'App\Http\Controllers\StudentController@store')->name('storeStudent');

//Create Message.
Route::get('message/{receiver}', 'App\Http\Controllers\MessageController@create')->name('message');

//Store Message.
Route::post('message/to/{receiver}', 'App\Http\Controllers\MessageController@store')->name('sendMessage');

//Xem tin nhan da gui.
Route::get('outbox/{sender}', 'App\Http\Controllers\MessageController@outbox')->name('outbox');

//Xem tin nhan da nhan.
Route::get('inbox/{receiver}', 'App\Http\Controllers\MessageController@inbox')->name('inbox');

//Sua tin nhan.
Route::get('message/edit/{id}', 'App\Http\Controllers\MessageController@edit')->name('editMessage');

//Thuc hien sua tin nhan.
Route::post('message/edited', 'App\Http\Controllers\MessageController@update')->name('editedMessage');

//Xoa tin nhan.
Route::get('message/delete/{id}', 'App\Http\Controllers\MessageController@destroy')->name('deleteMessage');

//Assignment.
//Trang chung cua bai tap.
Route::get('assignment/index', 'App\Http\Controllers\AssignmentController@index')->name('assignment');

//Luu assignment vao folder.
Route::post('assignment/store', 'App\Http\Controllers\AssignmentController@storeAssignment')->name('storeAssignment');

//Download cau hoi.
Route::get('assignment/download/{file}', 'App\Http\Controllers\AssignmentController@downloadAssignment')->name('downloadAssignment');

//Them cau tra loi.
Route::get('assignment/submit', 'App\Http\Controllers\AssignmentController@submit')->name('submitAnswer');

//Luu answer vao folder.
Route::post('answer/store', 'App\Http\Controllers\AssignmentController@storeAnswer')->name('storeAnswer');

//List cau tra loi.
Route::get('assignment/listAnswers', 'App\Http\Controllers\AssignmentController@listAnswer')->name('listAnswer');

//Download cau tra loi.
Route::get('answer/download/{file}', 'App\Http\Controllers\AssignmentController@downloadAnswer')->name('downloadAnswer');

//Challenge
//Them challenge.
Route::get('challenge/add', 'App\Http\Controllers\ChallengeController@add')->name('addChallenge');

//List challenge.
Route::get('challenge/list', 'App\Http\Controllers\ChallengeController@list')->name('listChallenge');

//Upload challenge.
Route::post('challenge/upload', 'App\Http\Controllers\ChallengeController@upload')->name('challengeUpload');

//Man hinh submit soltution challenge.
Route::get('challenge/{folder}', 'App\Http\Controllers\ChallengeController@show')->name('challengeSolveView');

//Submit va kiem tra challenge.
Route::post('challenge/solve/{folder}', 'App\Http\Controllers\ChallengeController@solve')->name('challengeSolve');
