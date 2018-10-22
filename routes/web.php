<?php

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

//Route::get('/', function () {
//    return view('welcome');
//});


Route::get('/', function () {
    return view('home');
});

Route::get('/subject', function () {
    return view('subject.index');
});
Route::get('/subject/view', function () {
    return view('subject.view');
});




Route::get('/attendance/list', function () {
    return view('create_otp.students');
});
Route::get('/st-attendance/list', function () {
    return view('attendance.index');
});




Route::get('/attendance/insert', function () {
    return view('create_otp.insert');
});

Route::get('/st-attendance/select', function () {
    return view('attendance.select');
});

Route::get('/st-attendance/insert', function () {
    return view('attendance.insert');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



Route::get('/subject/insert', 'SubjectController@insert_form');
Route::get('/subject', 'SubjectController@index');
Route::get('/subject/view/{id}', 'SubjectController@view');

Route::get('/subject/delete/{id}', 'SubjectController@delete');


Route::post('/subject/create', 'SubjectController@store');
Route::post('/post/create', 'PostController@store');
Route::post('/comment/create', 'CommentController@store');
Route::post('/attendance/create', 'AttendanceController@store');
Route::post('attendance/subject-select', 'AttendanceController@select_subject');
Route::post('/attendance/delete', 'AttendanceController@destroy');
