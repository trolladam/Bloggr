@extends('_layout.master')

@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/12.0.0/classic/ckeditor.js"></script>

    <script>
        ClassicEditor
            .create(document.querySelector('#editor'))
            .catch(error => {
                console.error(error);
            });
        
        Dropzone.autoDiscover = false;
        var myDropzone = new Dropzone("#post-image",{ 
            headers: {
                'x-csrf-token': csrf_token,
            },
        });
    </script>
@endpush

@push('styles')
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.css">
@endpush

@section('content')
    <div class="card w-75 mt-5 mx-auto">
        <div class="card-header">{{ __('Edit post') }}</div>
        <div class="card-body">
            <form action="{{ route('post.edit', ['post' => $post]) }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="post[title]">{{ __('Title') }}</label>
                    <input
                        class="form-control{{ $errors->has('post.title') ? ' is-invalid' : '' }}"
                        type="text"
                        name="post[title]"
                        value="{{ old('post.title', $post->title) }}">
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
                            <option value="{{ $topic->id }}" {{ $topic->id == old('post.topic_id', $post->topic_id) ? 'selected' : '' }}>{{ $topic->title }}</option>
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
                    <textarea class="form-control{{ $errors->has('post.description') ? ' is-invalid' : '' }}" name="post[description]">{{ old('post.description', $post->description) }}</textarea>
                    @if ($errors->has('post.description'))
                    <span class="invalid-feedback" role="alert">
                        {{ $errors->first('post.description') }}
                    </span>
                    @endif
                </div>

                <div class="form-group">
                    <label for="post[content]">{{ __('Content') }}</label>
                    <textarea id="editor" class="form-control{{ $errors->has('post.content') ? ' is-invalid' : '' }}" name="post[content]">{{ old('post.content', $post->content) }}</textarea>
                    @if ($errors->has('post.content'))
                    <span class="invalid-feedback" role="alert">
                        {{ $errors->first('post.content') }}
                    </span>
                    @endif
                </div>

                <div class="form-group text-right">
                    <button class="btn btn-primary" type="submit">{{ __('Save') }}</button>
                </div>

            </form>
        </div>
    </div>
    <div class="card w-75 mt-5 mx-auto">
        <div class="card-header">{{ __('Upload image') }}</div>
        <div class="card-body">
            @if ($post->has_image)
                <form action="{{ route('post.delete-image', ['post' => $post]) }}" method="POST">
                    @csrf
                    <img height="100" src="{{ $post->image->s }}" alt="image">
                    <button class="btn btn-danger" type="submit">Delete image</button>
                </form>
            @endif
            <form action="{{ route('post.upload-image', ['post' => $post]) }}" class="dropzone" id="post-image" method="POST">
                <div class="fallback">
                    <input name="file" type="file" multiple />
                </div>
            </form>
        </div>
    </div>
@endSection