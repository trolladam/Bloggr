<article class="post mt-3">
    <h2>
        <a href="{{ route('post.show', ['post' => $post]) }}">{{ $post->title }}</a>
    </h2>
    <div>
        
    </div>
    <div class="clearfix">
        <div class="float-left">
            <img height="50" src="{{ $post->image->s }}" alt="{{ $post->title }}">
        </div>
        <div class="float-left">
            {{ $post->description }}
        </div>
    </div>
    <p>
        <span>
            {{__('Created by:')}}
            <a href="{{ route('profile.show', ['user' => $post->user]) }}">{{ $post->user->fullname }}</a>
        </span>
        <span>{{__('In:')}} {{ $post->topic->title }}</span>
        <span>{{ $post->created_at->diffForHumans() }}</span>
    </p>
    <hr>
</article>
