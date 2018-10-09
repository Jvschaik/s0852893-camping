<?php

Route::get('/', 'PagesController@index');
Route::resource('posts', 'PostController');
Route::get('post/{slug}', ['as' => 'blog.single', 'uses' => 'BlogController@getSingle'])->where('slug', '[\w\d\-\_]+'); // any letter\ any number\ any dash\ any underscore

Route::get('post', ['uses' => 'BlogController@getIndex', 'as' => 'blog.index']);

Route::get('contact', 'PagesController@getContact'); //go to PagesController and do what's inside getContact()
Route::post('contact', 'PagesController@postContact');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('logout', 'Auth\LoginController@logout')->name('logout');

Route::prefix('password')->group(function() {
    Route::get('/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::post('/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    Route::get('/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
    Route::post('/reset', 'Auth\ResetPasswordController@reset');
});

Route::prefix('auth')->group(function() {
    Route::get('/login', 'Auth\LoginController@showLoginForm');
    Route::get('/register', 'Auth\RegisterController@showRegistrationForm');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('categories', 'CategoryController', ['except' => ['create']]);
Route::resource('tags', 'TagController', ['except' => ['create']]);

Route::prefix('reviews')->group(function() {
    Route::post('/{post_id}', ['uses' => 'ReviewsController@store', 'as' => 'reviews.store']);
    Route::get('/{id}/edit', ['uses' => 'ReviewsController@edit', 'as' => 'reviews.edit']);
    Route::put('/{id}', ['uses' => 'ReviewsController@update', 'as' => 'reviews.update']);
    Route::delete('/{id}', ['uses' => 'ReviewsController@destroy', 'as' => 'reviews.destroy']);
    Route::get('/{id}/delete', ['uses' => 'ReviewsController@delete', 'as' => 'reviews.delete']);
});

Route::prefix('admin')->group(function() {
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('/', 'AdminController@index')->name('admin.dashboard');
    Route::get('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');
});

Route::get('/users', 'UserController@index');
Route::resource('users', 'UserController');
Route::get('/users/logout', 'Auth\LoginController@userLogout')->name('user.logout');