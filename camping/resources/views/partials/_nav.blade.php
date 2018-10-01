<nav class="navbar navbar-toggleable-md navbar-light bg-faded">
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="/">Camping Review</a>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item {{ Request::is('/') ? "active": ""}}">
                <a class="nav-link" href="/">Home</a>
            </li>
            <li class="nav-item {{ Request::is('users') ? "active": ""}}">
                <a class="nav-link" href="/users">Owners</a>
            </li>
            <li class="nav-item {{ Request::is('posts') ? "active": ""}}">
                <a class="nav-link" href="/posts">Campings</a>
            </li>
            <li class="nav-item {{ Request::is('contact') ? "active": ""}}">
                <a class="nav-link" href="/contact">Contact</a>
            </li>
        </ul>

        <ul class="nav navbar-nav navbar-right">
            @if (Auth::check())

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Hi {{ Auth::user()->name }}
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="{{ route('posts.index') }}">Posts</a>
                        <a class="dropdown-item" href="{{ route('logout') }}">Log-out</a>
                    </div>
                </li>
            @else
                <a href="{{ route('register') }}" class="btn btn-warning " style="margin-right: 10px" >Register</a>
                <a href="{{ route('login') }}" class="btn btn-primary">Login</a>

            @endif
        </ul>

    </div>
</nav>
