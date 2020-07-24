@foreach($posts as $post)
    <div class="blog-post">
        @admin
        <h2 class="blog-post-title"><a href="{{ route('admin.posts.edit', ['post' => $post->slug]) }}">{{$post->name}}</a></h2>
        @else
            <h2 class="blog-post-title"><a href="{{ route('posts.show', ['post' => $post->slug]) }}">{{$post->name}}</a></h2>
        @endadmin
        <p class="blog-preview">{{$post->preview_text}}</p>
        <p class="blog-post-meta">{{$post->created_at}}</p>
        @admin
        <p>
            @if ($post->published)
                <span class="badge badge-success">Опубликовано</span>
            @else
                <span class="badge badge-danger">Не опубликовано</span>
            @endif
        </p>
        @endadmin

        @include('post.postTags')

    </div>
@endforeach
