@extends('_layout.master')

@section('content')
    <h1>{{ $user->fullname }}</h1>
    <img src="{{ $user->avatar }}" alt="{{ $user->fullname }}">
    <hr>
    <div>
        <form action="{{ route('profile.comment', ['user' => $user]) }}" method="POST">
            @csrf
            <div class="form-group">
                <textarea class="form-control" name="comment" placeholder="{{ __('Comment text...') }}"></textarea>
            </div>
            <div class="form-group">
                <button class="btn btn-primary" type="submit">Comment</button>
            </div>
        </form>
        <p>Comments:</p>
        @foreach ($user->comments as $comment)
            @include('comment._item')
        @endforeach
    </div>
    <hr>
    @foreach($user->posts as $post)
        @include('post._item')
    @endforeach
@endsection