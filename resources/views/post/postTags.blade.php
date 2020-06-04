@if ($post->tags->isNotEmpty())
<p>
    @foreach($post->tags as $tag)
        <a class="badge badge-secondary" href="/tags/{{$tag->id}}">{{$tag->name}}</a>
    @endforeach
</p>
@endif
