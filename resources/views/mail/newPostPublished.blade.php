@component('mail::message')
Опубликованы новые статьи:
@if ($posts)
    @foreach($posts as $post)
        <p><a href="{{route('posts.show', ['post' => $post->slug])}}">{{$post->name}}</a></p>
    @endforeach
@endif

Thanks,<br>
{{ config('app.name') }}
@endcomponent
