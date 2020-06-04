@extends('layouts.master')
@section('title')
Создание статьи
@endsection
@section('content')
    <div class="col-12 mb-3">
    <form method="POST" action="/posts">
        @csrf
        <div class="form-group">
            <label for="slug">Символьный код</label>
            <input type="text" class="form-control" id="slug" name="slug" value="{{old('slug')}}" required pattern="[a-zA-Z0-9_\-]+">
            @if ($errors->has('slug'))
                @error('slug')
                    <div class="alert-danger" >{{$message}}</div>
                @enderror
            @else
                <small>Может состоять только из A-Z a-z 0-9 и символов _-</small>
            @endif

        </div>
        <div class="form-group">
            <label for="name">Название</label>
            <input type="text" class="form-control" id="name" name="name" value="{{old('name')}}" required minlength="5" maxlength="100">
            @error('name')
            <div class="alert-danger">{{$message}}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="preview_text">Текст для анонса</label>
            <textarea class="form-control" id="preview_text" name="preview_text" required maxlength="255">{{old('preview_text')}}</textarea>
            @error('preview_text')
            <div class="alert-danger">{{$message}}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="detail_text">Текст статьи</label>
            <textarea class="form-control" id="detail_text" name="detail_text" required>{{old('detail_text')}}</textarea>
            @error('detail_text')
            <div class="alert-danger">{{$message}}</div>
            @enderror
        </div>
        <div class="form-group form-check">
            <input type="checkbox" class="form-check-input" name="published" id="published" value="1" checked>
            <label class="form-check-label" for="published">Опубликовать</label>
        </div>
        <button type="submit" class="btn btn-primary">Добавить</button>
    </form>
    </div>
@endsection
