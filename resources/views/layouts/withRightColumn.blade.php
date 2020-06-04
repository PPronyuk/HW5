@extends('layouts.master')

@section('main')
    <div class="row">
        <div class="col-sm-9">
            @yield('content')
        </div>
        <div class="col-sm-3">
            @if ($tagsCloud->isNotEmpty())
            <div>
                @foreach($tagsCloud as $tag)
                    <a class="badge badge-secondary" href="/tags/{{$tag->id}}">{{$tag->name}}</a>
                @endforeach
            </div>
            @endif
        </div>
    </div>
@endsection
