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

Route::post('login',                                        'AuthController@login')->name('login');
Route::post('logout',                                       'AuthController@logout')->name('logout');

Route::group(['middleware' => ['guest']], function () {
    Route::get('',                                          'HomeController@index')->name('landing.index');
});

Route::group(['middleware' => ['auth.user'], 'as' => 'platform.'], function() {
    Route::get('dashboard',                                 'PlatformController@index')->name('index');
    // Route::get('browse',                                    'BrowseController@index')->name('browse.index');
    Route::get('browse/{course}',                           'QuestionController@index')->name('question.index');

    // Route::get('profile',                                   'AccountController@index')->name('account.index');
    // Route::get('profile/{user}/edit',                       'AccountController@edit')->name('account.edit');
    // Route::patch('profile/{user}',                          'AccountController@update');
});
