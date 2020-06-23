<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Requests\PostRequest;
use App\Post;
use App\Notifications\PostChanged;

class PostsController extends Controller
{
    public $redirectTo = '/posts';

    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::where('published', 1)->latest()->get();

        return view('home', compact('posts'));    //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('post.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        $validatedInput = $request->validated();

        $validatedInput['owner_id'] = Auth::id();

        $post = Post::create($validatedInput);

        $post->updateTags($request->tags);

        $message = 'Статья "' . $post->name . '" добавлена!';

        message($message);
        admin()->notify(new PostChanged($post, $message));

        return redirect($this->redirectTo);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('post.detail', compact('post'));
    }

    public function edit(Post $post)
    {
        $this->authorize('update', $post);

        return view('post.edit', compact('post'));
    }

    public function update(PostRequest $request, Post $post)
    {
        $this->authorize('update', $post);
        $validatedInput = $request->validated();

        $post->update($validatedInput);

        $post->updateTags($request->tags);

        $message = 'Статья "' . $post->name . '" обновлена!';

        message($message);
        admin()->notify(new PostChanged($post, $message));

        return redirect($this->redirectTo);
    }

    public function destroy(Post $post)
    {
        $post->delete();

        $message = 'Статья "' . $post->name . '" удалена!';

        message($message, 'danger');
        admin()->notify(new PostChanged($post, $message));

        return redirect($this->redirectTo);
    }
}
