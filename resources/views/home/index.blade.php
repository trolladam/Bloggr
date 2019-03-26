@extends('_layout.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @forelse ($posts as $post)
                @include('post._item')
            @empty
                <div class="alert alert-warning">
                    {{ __("No posts to show.") }}
                </div>
            @endforelse
        </div>
    </div>
</div>
@endsection
