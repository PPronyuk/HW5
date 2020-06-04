@extends('layouts.noColumns')
@section('title')
Создание статьи
@endsection
@section('content')
    <div class="col-12 mb-3">
    <form method="POST" action="/posts">
        @include('post.formFields')

        <button type="submit" class="btn btn-primary">Добавить</button>
    </form>
    </div>
@endsection
