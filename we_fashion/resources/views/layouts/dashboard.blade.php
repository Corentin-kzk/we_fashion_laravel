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
    <link href="https://cdn.jsdelivr.net/npm/tom-select@2.2.2/dist/css/tom-select.bootstrap5.css" rel="stylesheet">

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/tom-select@2.2.2/dist/js/tom-select.complete.min.js"></script>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <div class="container-fluid">
        <header>
            <nav class="navbar bg-body-tertiary bg-dark">
                <div class="container">
                    <span class="text-primary mb-0 h1">{{ config('app.name', 'Laravel') }}</span>
                    <div class="btn-group">
                        <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-person-circle"></i>
                        </button>
                        <ul class="dropdown-menu">
                            <li>
                                <div class="dropdown-item">
                                    <p><i class="bi bi-person"></i> {{Auth::user()->name}}</p>
                                </div>
                            </li>
                            <li>
                                <a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Se deconnecter</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </li>

                        </ul>
                    </div>

                </div>
            </nav>
            <nav class="navbar navbar-expand-lg bg-body-tertiary bg-light">
                <div class="container">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('admin.products')}}">Produits</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('admin.categories')}}">Categories</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>
        <main class="container" style="min-height: 100vh;">
            @yield('content')
        </main>
        <footer>
            <span>@Dashboard-administrateur</span>
        </footer>
    </div>


    <script>
        const selectMultipleArray = document.querySelectorAll('select[multiple]')
        selectMultipleArray.forEach((el)=> new TomSelect(`#${el.id}`, { plugins:  {remove_button: {title: 'Supprimer'}} }))
    </script>
</body>


</html>
