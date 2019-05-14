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
        @can('update', $post)
            <span>
                <a href="{{ route('post.edit', ['post' => $post]) }}">Edit</a>
            </span>
        @endcan
    </p>
    <p>{{ $post->description }}</p>
    <div>
        {!! $post->content !!}
    </div>
    <hr>
    <div>
        <form action="{{ route('post.comment', ['post' => $post]) }}" method="POST">
            @csrf
            <div class="form-group">
                <textarea class="form-control" name="comment" placeholder="{{ __('Comment text...') }}"></textarea>
            </div>
            <div class="form-group">
                <button class="btn btn-primary" type="submit">Comment</button>
            </div>
        </form>
        <p>Comments:</p>
        @foreach ($post->comments as $comment)
            @include('comment._item')
        @endforeach
    </div>
</div>
@endsection
