<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <meta name="og:title" content="@yield('title', 'Bloggr')">
    <meta name="og:image" content="@yield('image', asset('/images/og.jpg'))">

    <title>@yield('title', 'Bloggr')</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.0/css/bootstrap.min.css" integrity="sha384-PDle/QlgIONtM1aqA2Qemk5gPOE7wFq8+Em+G/hmo5Iq0CCmYZLv3fVRDJ4MMwEA" crossorigin="anonymous">
    @stack('styles')
    <style>
        .comment .replies form {
            display: none;
        }
        .comment.replying .replies form {
            display: block;
        }


        .comment .reply-btn .text-cancel {
            display: none;
        }

        .comment.replying .reply-btn .text-cancel {
            display: inline;
        }
        .comment.replying .reply-btn .text-reply {
            display: none;
        }
    </style>
</head>
<body>
    @include('_layout._header')
    <main class="container">
        @include('_layout.alerts._success')
        @yield('content')
    </main>
    
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.0/js/bootstrap.min.js" integrity="sha384-7aThvCh9TypR7fIc2HV4O/nFMVCBwyIUKL8XCtKE+8xgCgl/PQGuFsvShjr74PBp" crossorigin="anonymous"></script>
    <script>
        var csrf_token = "{{ csrf_token() }}";
    </script>

    <script src="{{ asset('/js/comment.js') }}"></script>
    @stack('scripts')
</body>
</html>