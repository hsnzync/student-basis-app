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
    Route::get('',                                          'HomeController@index')->name('index');
    Route::post('',                                         'HomeController@create');
    Route::get('catalog',                                   'HomeController@catalog')->name('landing.catalog');
    Route::get('catalog/{slug}',                            'HomeController@show')->name('landing.show');
});

Route::group(['middleware' => ['auth']], function() {
    // Route::get('browse',                                 'SchoolController@index')->name('school.index');
    Route::get('browse',                                    'ProgrammeController@index')->name('programme.index');
    Route::get('browse/{programme}',                        'SubjectController@index')->name('subject.index');
    Route::get('browse/{programme}/{subject}',              'CourseController@index')->name('course.index');
    Route::get('browse/{programme}/{subject}/{course}',     'QuestionController@index')->name('question.index');

    Route::get('profile',                                   'AccountController@index')->name('account.index');
    Route::get('profile/{user}/edit',                       'AccountController@edit')->name('account.edit');
    Route::patch('profile/{user}',                          'AccountController@update');
});

Route::group(['middleware' => ['admin'], 'namespace' => 'Admin'], function() {
    Route::get('dashboard',                                 'AdminController@index')->name('home.index');

    Route::resource('school',                               'SchoolController')->except(['destroy']);
    Route::resource('programme',                            'ProgrammeController');
    Route::resource('subject',                              'SubjectController');
    Route::resource('course',                               'CourseController');
});