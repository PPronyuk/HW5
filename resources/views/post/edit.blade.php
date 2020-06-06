@extends('layouts.noColumns')
@section('title')
    Редактирование статьи
@endsection
@section('content')
    <div class="col-12 mb-3">
        <form method="POST" action="{{ route('posts.update', ['post' => $post->slug]) }}">
            @method('patch')
            @include('post.formFields')
            <input type="hidden" name="post_id" value="{{$post->id}}">
            <button type="submit" class="btn btn-primary">Сохранить</button>
            <a href="{{ route('posts.show', ['post' => $post->slug]) }}"><button class="btn btn-secondary">Отмена</button></a>
        </form>
    </div>
@endsection
