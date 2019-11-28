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
});




Route::resource('/questions','QuestionsController');

Route::resource('members', 'MembersController');

Route::post('/comments/{id}','CommentsController@store')->name('comments.store');

Route::delete('/comments/{id}','CommentsController@destroy')->name('comments.destroy');

Route::get('custom-register','CustomAuthController@showRegisterForm')->name('custom.register');

Route::post('custom-register','CustomAuthController@register');

Route::get('custom-login','CustomAuthController@showLoginForm')->name('custom.login');

Route::post('custom-login','CustomAuthController@login');

Route::get('logout', 'CustomAuthController@logout');

Route::post('logout', 'CustomAuthController@logout')->name('logout');