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

Route::get('/', function () {
    return view('welcome');
})->name('home');



Route::resource('/questions','QuestionsController');

Route::post('/comments/{id}','CommentsController@store')->name('comments.store');

Route::delete('/comments/{id}','CommentsController@destroy')->name('comments.destroy');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Route::post('/questions', 'QuestionsController@ajaxUserInfo')->name('ajaxRequest.post');


