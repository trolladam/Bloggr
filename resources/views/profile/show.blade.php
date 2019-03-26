@extends('_layout.master')

@section('content')
    <h1>{{ $user->fullname }}</h1>
    <img src="{{ $user->avatar }}" alt="{{ $user->fullname }}">
    @foreach($user->posts as $post)
        @include('post._item')
    @endforeach
@endsection