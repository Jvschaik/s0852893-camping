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
            <div class="dropdown">
                <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    My account
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="{{ route('posts.index') }}">Posts</a>
                    <a class="dropdown-item" href="#">Log-out</a>
                </div>
            </div>
        </ul>

    </div>
</nav>
