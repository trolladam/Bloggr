@extends('_layout.master')

@section('title', $post->title)
@if ($post->has_image)
    @section('image', $post->image->l)
@endif

@section('content')
<div class="post post-show">
    <div class="container-sm">
        <h1 class="post-title">{{ $post->title }}</h1>
        <h2 class="post-subtitle mb-4">{{ $post->description }}</h2>
        @include('post._meta')
    </div>
    <img class="img-fluid mb-4" src="{{ $post->image->l }}" alt="{{ $post->title }}">
    <div class="container-sm mb-5">
        {!! $post->content !!}
    </div>
    <div>
        <div class="col-12 col-md-8 col-lg-6 col-xl-5 mx-auto">
            <p>{{ __("Responses") }}</p>
            <form class="mb-4" action="{{ route('post.comment', ['post' => $post]) }}" method="POST">
                @csrf
                <div class="form-group">
                    <textarea class="form-control" name="comment" placeholder="{{ __('Comment text...') }}"></textarea>
                </div>
                <div class="form-group">
                    <button class="btn btn-primary btn-block" type="submit">Comment</button>
                </div>
            </form>
            
            @foreach ($post->comments as $comment)
                @include('comment._item')
            @endforeach
        </div>
    </div>
</div>
@endsection
