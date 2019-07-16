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


// Route::get('/', 'WelcomeController@index');


Route::get('auth/twitter', 'Auth\SocialAuthController@redirectToProvider');
Route::get('auth/twitter/callback', 'Auth\SocialAuthController@handleProviderCallback');
Route::get('auth/twitter/logout', 'Auth\SocialAuthController@logout');

Route::get('/', 'HomeController@index');

Auth::routes();

Route::get('/home', 'WelcomeController@index')->name('home');

Route::get('/questions', 'QuestionController@index')->name('questions');
Route::get('/questions/create', 'QuestionController@create')->name('questions.create');

// Route::resource('questions', 'QuestionController', ['except' => ['index']]);

