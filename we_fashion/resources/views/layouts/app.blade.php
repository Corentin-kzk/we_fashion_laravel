<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <div class="container">
        <header>
            <nav class="navbar navbar-expand-lg bg-body-tertiary">
                <div class="container-fluid">
                    <a class="navbar-brand primary" href="{{ url('/') }}">We Fashion</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-md-between" id="navbarNav">
                        <ul class="navbar-nav">
                            @foreach ($navbars as $navbarItem)
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url($navbarItem->route) }}">{{ $navbarItem->name }}</a>
                            </li>
                            @endforeach
                        </ul>
                        <div class="justify-self-md-end">
                            @if(!Auth::check())
                            <a href="{{ route('login') }}" class="btn btn-link">Se connecter</a>
                            <a href="{{ route('register') }}" class="btn btn-link">S'enregister</a>
                            @endif
                            @if(Auth::check())
                            <div class="btn-group">
                                <button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false">
                                    Menu
                                </button>
                                <ul class="dropdown-menu dropdown-menu-lg-end">
                                    @if(Auth::user()->name)
                                    <li>
                                        <p class="text-center">{{Auth::user()->name}}</p>
                                    </li>
                                    @endif
                                    @if(Auth::user()->userType === 'admin')
                                    <li><a href="/admin" class="dropdown-item">interface d'administration</a></li>
                                    @endif
                                    <li>
                                        <a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Se deconnecter</a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </li>
                                </ul>
                            </div>
                            @endif
                        </div>
                    </div>

                </div>
            </nav>
        </header>
        <main class="container" style="min-height: 100vh;">
            @yield('content')
        </main>
        <footer>
            <ul class="nav justify-content-center">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Active</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>
            </ul>
        </footer>
    </div>
</body>

</html>
