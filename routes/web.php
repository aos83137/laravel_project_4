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



Route::get('/list/question','QuestionsController@index')->name('list.question');

Route::get('/view/question/{id}','ViewQuestionController@show')->name('view.question');

Route::get('/view/register','RegisterController@index');