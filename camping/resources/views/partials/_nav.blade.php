<nav class="navbar navbar-toggleable-md navbar-light bg-faded">
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
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
            <li class="nav-item {{ Request::is('post') ? "active": ""}}">
                <a class="nav-link" href="/post">Campings</a>
            </li>
            <li class="nav-item {{ Request::is('contact') ? "active": ""}}">
                <a class="nav-link" href="/contact">Contact</a>
            </li>
        </ul>

        <ul class="nav navbar-nav navbar-right">

        </ul>

    </div>
</nav>
