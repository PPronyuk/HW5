<?php

namespace App\Http\Controllers\Admin;

use App\Post;

class PostsController extends \App\Http\Controllers\PostsController
{
    public $redirectTo = '/admin/posts';

    public function __construct()
    {
        parent::__construct();
        $this->middleware('admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::latest()->get();

        return view('home', compact('posts'));
    }

}
