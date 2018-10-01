<?php

Route::get('/', 'PagesController@index');
Route::resource('posts', 'PostController');
Route::get('post/{slug}', ['as' => 'blog.single', 'uses' => 'BlogController@getSingle']) -> where('slug', '[\w\d\-\_]+'); // any letter\ any number\ any dash\ any underscore

Route::get('post',['uses'=> 'BlogController@getIndex', 'as' => 'blog.index']);

Route::get('contact', 'PagesController@getContact'); //go to PagesController and do what's inside getContact()

