<?php

Route::get('/', 'PostsController@index')->name('home');
Route::get('/posts/create', "PostsController@create")->name('createPost');
Route::post('/posts', "PostsController@store");
Route::get('/posts/{post}', "PostsController@show")->name('showPost');

Route::get('/contacts', "FeedbacksController@index")->name('contacts');
Route::post('/contacts', "FeedbacksController@store");

Route::get('/admin/feedbacks', "AdminController@index")->name('adminFeedbacks');

Route::get('/about', function () {
    return view('about', compact('title'));
})->name('about');


Route::get('/1', 'HomeController@index');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/1', 'HomeController@index');
Route::get('/2', 'HomeController@index');
