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
                            <li class="nav-item">
                                <a @class(["nav-link", 'active'=> Route::is('solde')] ) href="{{ route('solde') }}">Solde</a>
                            </li>
                            @foreach ($navbars as $navbarItem)
                            <li class="nav-item">
                                <a @class(["nav-link", 'active'=> Route::is($navbarItem->slug)] ) href="{{ url('/category/'.$navbarItem->slug) }}">{{ $navbarItem->label }}</a>
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
        <footer class="text-center text-lg-start bg-light text-muted">
            <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">
                <div class="me-5 d-none d-lg-block">
                    <span>Get connected with us on social networks: </span>
                </div>
                <div>
                    <a class="me-4 text-reset" href="https://facebook.fr"><i class="bi bi-facebook"></i></a>
                    <a class="me-4 text-reset" href="https://instagram.com"><i class="bi bi-instagram"></i></a>
                    <a class="me-4 text-reset" href="" name="newsletter"><i class="bi bi-newspaper"></i></a>
                </div>
            </section>

            <section>
                <div class="container text-center text-md-start mt-5">
                    <div class="row mt-3">
                        <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                            <h6 class="text-uppercase fw-bold mb-4">
                                informations
                            </h6>
                            <p>
                                <a href="#!" class="text-reset">Mentions légales</a>
                            </p>
                            <p>
                                <a href="#!" class="text-reset">Presse</a>
                            </p>
                            <p>
                                <a href="#!" class="text-reset">Fabrication</a>
                            </p>
                        </div>
                        <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">

                            <h6 class="text-uppercase fw-bold mb-4">
                                service client
                            </h6>
                            <p>
                                <a href="#!" class="text-reset">Contactez-nous</a>
                            </p>
                            <p>
                                <a href="#!" class="text-reset">Livraison &amp; Retour</a>
                            </p>
                            <p>
                                <a href="#!" class="text-reset">Conditions de vente </a>
                            </p>
                        </div>
                        <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                            <h6 class="text-uppercase fw-bold mb-4">Contact</h6>
                            <p><i class="fas fa-home me-3"></i> New York, NY 10012, US</p>
                            <p>
                                <i class="fas fa-envelope me-3"></i>
                                We_Fashion@example.com
                            </p>
                            <p><i class="fas fa-phone me-3"></i> + 01 234 567 88</p>
                            <p><i class="fas fa-print me-3"></i> + 01 234 567 89</p>
                        </div>
                    </div>
                </div>
            </section>
            <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
                inscrivez vous à la newsletter
                <div class="input-group flex-nowrap">
                    <span class="input-group-text" id="addon-wrapping">@</span>
                    <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="addon-wrapping">
                </div>
            </div>
        </footer>
    </div>
</body>

</html>
