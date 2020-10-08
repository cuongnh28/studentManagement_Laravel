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

//Xu ly User
//Edit Teacher
Route::get('teacher/{id}/edit', 'App\Http\Controllers\TeacherController@edit')->name('editTeacher')->middleware('auth');

//Thuc hien Update
Route::post('teacher/update', 'App\Http\Controllers\TeacherController@update')->name('updateTeacher')->middleware('auth');

//Edit Student
Route::get('student/{id}/edit', 'App\Http\Controllers\StudentController@edit')->name('editStudent')->middleware('auth');

//Thuc hien Update
Route::post('student/update', 'App\Http\Controllers\StudentController@update')->name('updateStudent')->middleware('auth');

//Delete Student.
Route::get('student/{id}/delete', 'App\Http\Controllers\StudentController@destroy')->name('deleteStudent')->middleware('auth');

//Add Student
Route::get('student/create', 'App\Http\Controllers\StudentController@create')->name('createStudent')->middleware('auth');

//Store Student
Route::post('student/create', 'App\Http\Controllers\StudentController@store')->name('storeStudent')->middleware('auth');

//Xu ly tin nhan.
//Create Message.
Route::get('message/{receiver}', 'App\Http\Controllers\MessageController@create')->name('message')->middleware('auth');

//Store Message.
Route::post('message/to/{receiver}', 'App\Http\Controllers\MessageController@store')->name('sendMessage')->middleware('auth');

//Xem tin nhan da gui.
Route::get('outbox/{sender}', 'App\Http\Controllers\MessageController@outbox')->name('outbox')->middleware('auth');

//Xem tin nhan da nhan.
Route::get('inbox/{receiver}', 'App\Http\Controllers\MessageController@inbox')->name('inbox')->middleware('auth');

//Sua tin nhan.
Route::get('message/edit/{id}', 'App\Http\Controllers\MessageController@edit')->name('editMessage')->middleware('auth');

//Thuc hien sua tin nhan.
Route::post('message/edited', 'App\Http\Controllers\MessageController@update')->name('editedMessage')->middleware('auth');

//Xoa tin nhan.
Route::get('message/delete/{id}', 'App\Http\Controllers\MessageController@destroy')->name('deleteMessage')->middleware('auth');

//Xu ly assignment.
//Trang chung cua bai tap.
Route::get('assignment/index', 'App\Http\Controllers\AssignmentController@index')->name('assignment')->middleware('auth');

//Luu assignment vao folder.
Route::post('assignment/store', 'App\Http\Controllers\AssignmentController@storeAssignment')->name('storeAssignment')->middleware('auth');

//Download cau hoi.
Route::get('assignment/download/{file}', 'App\Http\Controllers\AssignmentController@downloadAssignment')->name('downloadAssignment')->middleware('auth');

//Them cau tra loi.
Route::get('assignment/submit', 'App\Http\Controllers\AssignmentController@submit')->name('submitAnswer')->middleware('auth');

//Luu answer vao folder.
Route::post('answer/store', 'App\Http\Controllers\AssignmentController@storeAnswer')->name('storeAnswer')->middleware('auth');

//List cau tra loi.
Route::get('assignment/listAnswers', 'App\Http\Controllers\AssignmentController@listAnswer')->name('listAnswer')->middleware('auth');

//Download cau tra loi.
Route::get('answer/download/{file}', 'App\Http\Controllers\AssignmentController@downloadAnswer')->name('downloadAnswer')->middleware('auth');

//Xu ly Challenge
//Them challenge.
Route::get('challenge/add', 'App\Http\Controllers\ChallengeController@add')->name('addChallenge')->middleware('auth');

//List challenge.
Route::get('challenge/list', 'App\Http\Controllers\ChallengeController@list')->name('listChallenge')->middleware('auth');

//Upload challenge.
Route::post('challenge/upload', 'App\Http\Controllers\ChallengeController@upload')->name('challengeUpload')->middleware('auth');

//Man hinh submit soltution challenge.
Route::get('challenge/{folder}', 'App\Http\Controllers\ChallengeController@show')->name('challengeSolveView')->middleware('auth');

//Submit va kiem tra challenge.
Route::post('challenge/solve/{folder}', 'App\Http\Controllers\ChallengeController@solve')->name('challengeSolve')->middleware('auth');
