<?php

Route::get('/', 'PagesController@index');
Route::resource('posts', 'PostController');
Route::get('post/{slug}', ['as' => 'blog.single', 'uses' => 'BlogController@getSingle']) -> where('slug', '[\w\d\-\_]+'); // any letter\ any number\ any dash\ any underscore

Route::get('post',['uses'=> 'BlogController@getIndex', 'as' => 'blog.index']);

Route::get('contact', 'PagesController@getContact'); //go to PagesController and do what's inside getContact()

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('auth/login', 'Auth\LoginController@showLoginForm');
Route::get('auth/register', 'Auth\RegisterController@showRegistrationForm');
Route::get('logout', 'Auth\LoginController@logout')->name('logout');

Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
