@extends('_layout.master')

@section('content')
    <div class="card w-75 mt-5 mx-auto">
        <div class="card-header">{{ __('Publish post') }}</div>
        <div class="card-body">
            <form action="{{ route('post.create') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="post[title]">{{ __('Title') }}</label>
                    <input class="form-control" type="text" name="post[title]">
                </div>

                <div class="form-group">
                    <label for="post[topic_id]">{{ __('Topic') }}</label>
                    <select class="form-control" name="post[topic_id]">
                        <option>{{ __("Select your topic") }}</option>
                        @foreach ($topics as $topic)
                            <option value="{{ $topic->id }}">{{ $topic->title }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="post[description]">{{ __('Description') }}</label>
                    <textarea class="form-control" name="post[description]"></textarea>
                </div>

                <div class="form-group">
                    <label for="post[content]">{{ __('Content') }}</label>
                    <textarea class="form-control" name="post[content]"></textarea>
                </div>

                <div class="form-group text-right">
                    <button class="btn btn-primary" type="submit">{{ __('Publish') }}</button>
                </div>

            </form>
        </div>
    </div>
@endSection