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

Auth::routes();

Route::group(['middleware' => ['guest']], function () {
    Route::get('',                                          'HomeController@index')->name('landing.index');
    Route::post('',                                         'HomeController@create');
});

Route::group(['middleware' => ['user']], function() {
    Route::get('browse',                                    'SubjectController@index')->name('browse.index');
    Route::get('browse/{subject}',                          'CourseController@index')->name('course.index');
    Route::get('browse/{subject}/{course}',                 'QuestionController@index')->name('question.index');

    Route::get('profile',                                   'AccountController@index')->name('account.index');
    Route::get('profile/{user}/edit',                       'AccountController@edit')->name('account.edit');
    Route::patch('profile/{user}',                          'AccountController@update');
});