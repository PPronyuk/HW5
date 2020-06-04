@extends('layouts.withRightColumn')
@section('title')
Статьи по тегу: {{$tag->name}}
@endsection

@section('content')
    @include('post.postList')
@endsection
