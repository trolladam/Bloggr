<nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">Bloggr.</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample07" aria-controls="navbarsExample07" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    
        <div class="collapse navbar-collapse" id="navbarsExample07">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}">Home</a>
                </li>
                @auth
                    <li class="nav-item">
                        <a class="btn btn-outline-success" href="{{  route('post.create') }}">{{ __("Publish") }}</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="avatar nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                            <img class="rounded-circle" src="{{ Auth::user()->avatar }}" alt="{{ __("Avatar") }}">
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#">{{ __("Profile") }}</a>
                            <a class="dropdown-item" href="#" onclick="document.getElementById('header-logout').submit()">{{ __("Logout") }}</a>
                            <form id="header-logout" class="d-none" action="{{ route('logout') }}" method="POST">@csrf</form>
                        </div>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __("Sign in") }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-outline-success" href="{{ route('register') }}">{{ __("Become a member") }}</a>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>