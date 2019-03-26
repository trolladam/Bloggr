@extends('_layout.master')

@push('scripts')
    <script src="https://cdn.ckeditor.com/ckeditor5/12.0.0/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#editor'))
            .catch(error => {
                console.error(error);
            });
    </script>
@endpush

@section('content')
    <div class="card w-75 mt-5 mx-auto">
        <div class="card-header">{{ __('Publish post') }}</div>
        <div class="card-body">
            <form action="{{ route('post.create') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="post[title]">{{ __('Title') }}</label>
                    <input
                        class="form-control{{ $errors->has('post.title') ? ' is-invalid' : '' }}"
                        type="text"
                        name="post[title]"
                        value="{{ old('post.title') }}">
                    @if ($errors->has('post.title'))
                    <span class="invalid-feedback" role="alert">
                        {{ $errors->first('post.title') }}
                    </span>
                    @endif
                </div>

                <div class="form-group">
                    <label for="post[topic_id]">{{ __('Topic') }}</label>
                    <select class="form-control{{ $errors->has('post.topic_id') ? ' is-invalid' : '' }}" name="post[topic_id]">
                        <option>{{ __("Select your topic") }}</option>
                        @foreach ($topics as $topic)
                            <option value="{{ $topic->id }}" {{ $topic->id == old('post.topic_id') ? 'selected' : '' }}>{{ $topic->title }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('post.topic_id'))
                    <span class="invalid-feedback" role="alert">
                        {{ $errors->first('post.topic_id') }}
                    </span>
                    @endif
                </div>

                <div class="form-group">
                    <label for="post[description]">{{ __('Description') }}</label>
                    <textarea class="form-control{{ $errors->has('post.description') ? ' is-invalid' : '' }}" name="post[description]">{{ old('post.description') }}</textarea>
                    @if ($errors->has('post.description'))
                    <span class="invalid-feedback" role="alert">
                        {{ $errors->first('post.description') }}
                    </span>
                    @endif
                </div>

                <div class="form-group">
                    <label for="post[content]">{{ __('Content') }}</label>
                    <textarea id="editor" class="form-control{{ $errors->has('post.content') ? ' is-invalid' : '' }}" name="post[content]">{{ old('post.content') }}</textarea>
                    @if ($errors->has('post.content'))
                    <span class="invalid-feedback" role="alert">
                        {{ $errors->first('post.content') }}
                    </span>
                    @endif
                </div>

                <div class="form-group text-right">
                    <button class="btn btn-primary" type="submit">{{ __('Publish') }}</button>
                </div>

            </form>
        </div>
    </div>
@endSection