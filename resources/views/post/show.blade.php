@extends('_layout.master')

@section('title', $post->title)
@if ($post->has_image)
    @section('image', $post->image->l)
@endif

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
        @auth
            @if (Auth::user() == $post->user)
            <span>
                <a href="{{ route('post.edit', ['post' => $post]) }}">Edit</a>
            </span>
            @endif
        @endauth
    </p>
    <p>{{ $post->description }}</p>
    <div>
        {!! $post->content !!}
    </div>
</div>
@endsection
