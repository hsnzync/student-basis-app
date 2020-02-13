<?php

Route::group(['as' => 'admin.'], function() {
    Route::get('',                                          'AdminController@index')->name('index');

    Route::resource('school',                               'SchoolController');
    Route::resource('grade',                                'GradeController');
    Route::resource('subject',                              'SubjectController');
    Route::resource('subject/{subject}/course',             'CourseController');
    Route::resource('user',                                 'UserController');
});
