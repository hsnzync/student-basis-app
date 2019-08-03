<?php

Route::group(['as' => 'admin.'], function() {
    Route::get('dashboard',                                 'AdminController@index')->name('home.index');

    Route::resource('school',                               'SchoolController');
    Route::resource('programme',                            'ProgrammeController');
    Route::resource('subject',                              'SubjectController');
    Route::resource('subject/{subject}/course',             'CourseController');
    Route::resource('user',                                 'UserController');
});