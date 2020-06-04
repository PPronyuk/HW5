@extends('layouts.master')
@section('title')
Контакты
@endsection
@section('content')
    <div class="col-12 text-dark">
        Наши контакты:<br>
        +7-997-999-77-00<br>
        mail@laratest.loc
    </div>
    <h2>Оставить сообщение:</h2>
    <div class="col-12">
        @if (session('msgSent'))
            <div class="alert-success">Сообщение отправлено.</div>
        @endif
        <form method="POST" action="/contacts">
            @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">Email</label>
                <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" value="{{old('email')}}" required>
                @error('email')
                <div class="alert-danger">{{$message}}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="detail_text">Сообщение</label>
                <textarea class="form-control" id="message" name="message" required>{{old('message')}}</textarea>
                @error('message')
                <div class="alert-danger">{{$message}}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Добавить</button>
        </form>
    </div>
@endsection
