<?php

Route::resource('/posts', 'PostsController');

Route::get('/tags/{tag}', 'TagsController@show')->name('tags.show');

Route::get('/contacts', "FeedbacksController@index")->name('contacts');
Route::post('/contacts', "FeedbacksController@store")->name('feedbacks.create');

Route::get('/admin/feedbacks', "Admin\FeedbacksController@index")->name('admin.feedbacks')->middleware(['auth', 'admin']);

Route::resource('/admin/posts', "Admin\PostsController")->names('admin.posts');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/', 'PostsController@index')->name('home');

Auth::routes();
