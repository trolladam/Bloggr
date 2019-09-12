<div class="post-meta d-flex">
    <a href="{{ route('profile.show', ['user' => $post->user]) }}">
        <img class="avatar rounded-circle" src="{{ $post->user->avatar }}" alt="{{ $post->user->full_name }}">
    </a>
    <div class="info ml-2">
        <p>
            <a class="user" href="{{ route('profile.show', ['user' => $post->user]) }}">{{ $post->user->full_name }}</a>
            <a class="follow btn btn-sm btn-outline-dark ml-2" href="#">Follow</a>
        </p>
        <p>{{ $post->created_at->format('Y M d')}} &#9679; {{ $post->minutes_to_read }}</p>
    </div>
    <div class="ml-auto">
        <p class="topic text-right">{{ $post->topic->title }}</p>
    </div>
</div>