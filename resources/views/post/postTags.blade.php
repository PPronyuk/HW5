@if ($post->tags->isNotEmpty())
<p>
    @foreach($post->tags as $tag)
        <a class="badge badge-secondary" href="{{ route('tags.show', ['tag' => $tag->id]) }}">{{$tag->name}}</a>
    @endforeach
</p>
@endif
