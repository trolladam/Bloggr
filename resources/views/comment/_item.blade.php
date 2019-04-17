<div class="comment card mb-3">
    <div class="card-header">
        <a href="{{ route('profile.show', ['user' => $comment->user]) }}">{{ $comment->user->fullname }}</a>
        <span>{{ $comment->created_at->diffForHumans() }}</span>
    </div>
    <div class="card-body">
        <p>
            {{ $comment->body }}
        </p>
    </div>
</div>
