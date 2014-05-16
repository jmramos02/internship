<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/','StudentController@showIndex');
Route::post('student/getsections','StudentController@getSections');
Route::resource('course','CourseController');
Route::resource('section','SectionController');
Route::resource('student','StudentController');