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
Route::get('error/{code}', function ($code) {
    abort($code);
  });


Route::get('auth/twitter', 'Auth\SocialAuthController@redirectToProvider');
Route::get('auth/twitter/callback', 'Auth\SocialAuthController@handleProviderCallback');
Route::get('auth/twitter/logout', 'Auth\SocialAuthController@logout');

Route::get('/', 'HomeController@index');

Auth::routes();

// index, show, create, store, update, deleteだよ〜


Route::get('/questions', 'QuestionController@index')->name('questions.index');

Route::group(['middleware' => 'auth'], function() {
    Route::get('/questions/create', 'QuestionController@create')->name('questions.create');
});
Route::get('/questions/{question}', 'QuestionController@show')->name('questions.show');
Route::post('/questions', 'QuestionController@store')->name('questions.store');
Route::get('/questions/{question}/edit', 'QuestionController@edit')->name('questions.edit');
Route::post('/questions/{question}/update', 'QuestionController@update')->name('questions.update');
Route::delete('/questions/{question}', 'QuestionController@destroy')->name('questions.destroy');




Route::get('/user/{user}', 'UserController@show')->name('users.profile');
Route::get('/user/{user}/edit', 'UserController@edit')->name('users.edit');
Route::post('user/{user}/update', 'UserController@update')->name('users.update');


Route::get('/answerrequests', 'AnswerRequestController@index')->name('answerrequests.index');
Route::group(['middleware' => 'auth'], function() {
    Route::post('/answerrequests', 'AnswerRequestController@store')->name('answerrequests.store');
});
Route::delete('/answerrequests/{answerrequest}', 'AnswerRequestController@destroy')->name('answerrequests.destroy');

Route::group(['middleware' => 'auth'], function() {
Route::get('/score/{user}/create', 'ScoreController@create')->name('scores.create');
});
Route::post('score/{user}/store', 'ScoreController@store')->name('scores.store');


