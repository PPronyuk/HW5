<?php

namespace App\Http\Controllers;

use App\Tag;
use Illuminate\Http\Request;

class TagsController extends Controller
{
    public function show(Tag $tag)
    {
        return view('tag', ['tag' => $tag, 'posts'=> $tag->posts]);
    }
}
