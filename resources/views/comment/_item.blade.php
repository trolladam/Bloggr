<div class="comment" id="comment-{{$comment->id}}">
    <div class="card mb-3">
        <div class="card-header">
            <a href="{{ route('profile.show', ['user' => $comment->user]) }}">{{ $comment->user->fullname }}</a>
            <span>{{ $comment->created_at->diffForHumans() }}</span>
        </div>
        <div class="card-body">
            <p>
                {{ $comment->body }}
            </p>
        </div>
        @if (!$comment->is_reply)
        <div class="card-footer text-right">
            <a class="reply-btn" href="#">
                <span class="text-reply">{{ __("Reply") }}</span>
                <span class="text-cancel">{{ __("Cancel") }}</span>
            </a>
        </div>
        @endif
    </div>
    @if (!$comment->is_reply)
    <div class="replies pl-5">
        <form action="{{ route('comment.reply', ['comment' => $comment]) }}" method="POST">
            @csrf
            <input type="hidden" value="{{URL::current()}}#comment-{{$comment->id}}" name="redirect_url">
            <div class="form-group">
                <textarea class="form-control" name="reply" placeholder="{{ __('Comment text...') }}"></textarea>
            </div>
            <div class="form-group">
                <button class="btn btn-primary" type="submit">{{ __('Reply') }}</button>
            </div>
        </form>

        @foreach ($comment->comments as $reply)
            @include('comment._item', ['comment' => $reply])
        @endforeach
    </div>
    @endif
</div>
