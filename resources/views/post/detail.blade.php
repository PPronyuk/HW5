@extends('layouts.withRightColumn')
@section('title')
    {{$post->name}}
@endsection
@section('content')
    <div class="blog-post">
        <p class="blog-post-meta">{{$post->created_at}}</p>
        <p class="blog-preview">
            {{$post->detail_text}}
        </p>

        @include('post.postTags')

    </div><!-- /.blog-post -->
    @can('update', $post)
        <form id="delete-post" method="POST" action="{{ route('posts.destroy', ['post' => $post->slug]) }}">
            @csrf
            @method('DELETE')
        </form>
        <div>
            <a class="btn btn-outline-primary" href="{{ route('posts.edit', ['post' => $post->slug]) }}">Редактировать</a>
            <a class="btn btn-outline-secondary" href="#" onClick="document.getElementById('delete-post').submit();">Удалить</a>
        </div>
    @endcan
    <div class="col-12 text-right mb-3">
        <a href="/">Вернуться к списку статей</a>
    </div>
@endsection
