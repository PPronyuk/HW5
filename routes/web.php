<?php

Route::resource('/posts', 'PostsController');

Route::get('/', 'PostsController@index')->name('home');

Route::get('/tags/{tag}', 'TagsController@show')->name('tags.show');

Route::get('/contacts', "FeedbacksController@index")->name('contacts');
Route::post('/contacts', "FeedbacksController@store")->name('feedbacks.create');

Route::get('/admin/feedbacks', "AdminController@index")->name('adminFeedbacks');

Route::get('/about', function () {
    return view('about');
})->name('about');

Auth::routes();
