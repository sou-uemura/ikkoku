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


Route::get('auth/twitter', 'Auth\SocialAuthController@redirectToProvider');
Route::get('auth/twitter/callback', 'Auth\SocialAuthController@handleProviderCallback');
Route::get('auth/twitter/logout', 'Auth\SocialAuthController@logout');

Route::get('/', 'HomeController@index');

Auth::routes();

Route::get('/questions', 'QuestionController@index')->name('questions');
Route::get('/questions/create', 'QuestionController@create')->name('questions.create');
Route::post('/questions/store', 'QuestionController@store')->name('store');

Route::get('/questions/{question}', 'QuestionController@show')->name('show');
Route::get('/user/{user}', 'UserController@show')->name('profile');
Route::get('/user/edit', 'UserController@edit')->name('edit');




// Route::resource('questions', 'QuestionController', ['except' => ['index']]);

