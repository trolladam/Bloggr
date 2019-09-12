<article class="post card mt-3">
    <div class="card-body">
        @include('post._meta')
        <a href="{{ route('post.show', ['post' => $post]) }}">
            <img class="post-thumbnail img-fluid" src="{{ $post->image->m }}" alt="{{ $post->title }}">
        </a>
        <h1 class="post-title">
            <a href="{{ route('post.show', ['post' => $post]) }}">{{ $post->title }}</a>
        </h1>
        <h2 class="post-subtitle">
            {{ $post->description }}
        </h2>
    </div>
</article>
