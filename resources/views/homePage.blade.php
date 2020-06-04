@extends('layouts.master')
@section('title')
Список статей
@endsection
@section('content')
    @foreach($posts as $post)
            <div class="blog-post">
                <h2 class="blog-post-title"><a href="/posts/{{$post->slug}}">{{$post->name}}</a></h2>
                <p class="blog-preview">{{$post->preview_text}}</p>
                <p class="blog-post-meta">{{$post->created_at}}</p>
            </div><!-- /.blog-post -->
    @endforeach
@endsection
