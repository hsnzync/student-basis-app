<?php

Route::group(['as' => 'admin.'], function() {
    Route::get('',                                          'AdminController@index')->name('index');

    Route::resource('school',                               'SchoolController');
    Route::resource('subject',                              'SubjectController');
    Route::resource('subject/{subject}/course',             'CourseController');
    Route::resource('student',                              'StudentController');
    Route::resource('user',                                 'UserController');
});
