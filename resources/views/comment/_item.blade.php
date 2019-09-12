<div class="comment" id="comment-{{$comment->id}}">
    <div class="card mb-3">
        <div class="card-body">
            <div class="comment-meta d-flex">
                <a href="{{ route('profile.show', ['user' => $comment->user]) }}">
                    <img class="avatar rounded-circle" src="{{ $comment->user->avatar }}" alt="{{ $comment->user->full_name }}">
                </a>
                <div class="info ml-2">
                    <p>
                        <a class="user" href="{{ route('profile.show', ['user' => $comment->user]) }}">{{ $comment->user->full_name }}</a>
                    </p>
                    <p>{{ $comment->created_at->diffForHumans() }}</p>
                </div>
                @if (!$comment->is_reply)
                <div class="ml-auto">
                    <a class="reply-btn" href="#">
                        <span class="text-reply">{{ __("Reply") }}</span>
                        <span class="text-cancel">{{ __("Cancel") }}</span>
                    </a>
                </div>
                @endif
            </div>
            <p>
                {{ $comment->body }}
            </p>
        </div>
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
                <button class="btn btn-primary btn-block" type="submit">{{ __('Reply') }}</button>
            </div>
        </form>

        @foreach ($comment->comments as $reply)
            @include('comment._item', ['comment' => $reply])
        @endforeach
    </div>
    @endif
</div>
