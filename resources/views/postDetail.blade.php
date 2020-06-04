@extends('layouts.master')
@section('title')
    {{$post->name}}
@endsection
@section('content')
    <div class="blog-post">
        <p class="blog-post-meta">{{$post->created_at}}</p>
        <p class="blog-preview">
            {{$post->detail_text}}
        </p>
    </div><!-- /.blog-post -->
    <div class="col-12 text-right mb-3">
        <a href="/">Вернуться к списку статей</a>
    </div>
@endsection
