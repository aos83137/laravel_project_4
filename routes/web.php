<?php

Route::get('/', function () {
    return view('welcome');
});




Route::resource('members','MemberController');

Route::get('/member','MemberController@create');

Route::post('/members/{id}','MemberController@update');

Route::get('/members/{id}/shows','MemberController@shows');

Route::resource('/questions','QuestionsController');

Route::post('/comments/{id}','CommentsController@store')->name('comments.store');

Route::delete('/comments/{id}','CommentsController@destroy')->name('comments.destroy');

Route::get('custom-register','CustomAuthController@showRegisterForm')->name('custom.register');

Route::post('custom-register','CustomAuthController@register');

Route::get('custom-login','CustomAuthController@showLoginForm')->name('custom.login');

Route::post('custom-login','CustomAuthController@login');

Route::get('japan', 'JapanController@index')->name('japan');

Route::get('japan/getdata', 'JapanController@getdata')->name('japan.getdata');

Route::get('japan/show{id}', 'JapanController@show')->name('japan.show');

Route::post('japan/postdata', 'JapanController@postdata')->name('japan.postdata');

Route::get('japan/fetchdata', 'JapanController@fetchdata')->name('japan.fetchdata');

Route::get('japan/removedata', 'JapanController@removedata')->name('japan.removedata');




Route::get('logout', 'CustomAuthController@logout');

Route::post('logout', 'CustomAuthController@logout')->name('logout');

Route::get('verify/{email}/{verifyToken}','CustomAuthController@sendEmailDone')->name('sendEmailDone');

Route::get('auth/remind', [
    'as' => 'remind.create',
    'uses' => 'PasswordsController@getRemind',
]);
Route::post('auth/remind', [
    'as' => 'remind.store',
    'uses' => 'PasswordsController@postRemind',
]);
Route::get('auth/reset/{token}', [
    'as' => 'reset.create',
    'uses' => 'PasswordsController@getReset',
]);
Route::post('auth/reset', [
    'as' => 'reset.store',
    'uses' => 'PasswordsController@postReset',
]);