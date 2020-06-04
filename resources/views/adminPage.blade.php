@extends('layouts.master')
@section('title')
Сообщения пользователей
@endsection
@section('content')
<table class="table">
   <thead class="thead-dark">
     <tr>
         <th scope="col">Email</th>
         <th scope="col">Сообщение</th>
         <th scope="col">Дата</th>
     </tr>
   </thead>
    <tbody>
@foreach($feedbacks as $feedback)
    <tr>
        <td>{{$feedback->email}}</td>
        <td>{{$feedback->message}}</td>
        <td>{{$feedback->created_at}}</td>
    </tr><!-- /.blog-post -->
@endforeach
    </tbody>
</table>
@endsection
