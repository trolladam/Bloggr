@extends('_layout.master')

@section('content')
<div class="post post-show">
    <h1>{{ $post->title }}</h1>
    <p>
        <span>
            {{ __('Created by:') }}
            <a href="{{ route('profile.show', ['user' => $post->user]) }}">{{ $post->user->fullname }}</a>
        </span>
        <span>{{ __('In:') }} {{ $post->topic->title }}</span>
        <span>{{ $post->created_at->diffForHumans() }}</span>
    </p>
    <p>{{ $post->description }}</p>
    <div>
        {!! $post->content !!}
    </div>
</div>
@endsection
