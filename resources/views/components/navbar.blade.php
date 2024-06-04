<head>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- Link Font Awesome -->
    <script src="https://kit.fontawesome.com/f9189b0d8d.js" crossorigin="anonymous"></script>

    <!-- link CSS -->
    <link rel="stylesheet" href="{{ asset('/assets/css/navbar.css') }}">
</head>

<body>
    <nav class="navbar navbar-expand-lg fixed-top bg-transparent">
        <div class="container">
            <div class="nav_img ms-1">
                <img src="{{ asset('assets/img/logo_bolen.png') }}" class="nav_first_img" alt="Logo">
            </div>
            <button class="navbar-toggler border-2 border-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav fs-5 font-weight-bold border-dark mx-auto">
                    <li class="nav-item mx-1 mb-2 {{ \Route::is('dasboard.index') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('dasboard.index') }}">Home</a>
                    </li>
                    <li class="nav-item mx-1 mb-2">
                        <a class="nav-link" href="Cerita4/oncerita4.html">About</a>
                    </li>
                    <li class="nav-item mx-1 mb-2 {{ \Route::is('Produk.index') || \Route::is('Produk.show') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('Produk.index') }}">Menu</a>
                    </li>
                    <li class="nav-item mx-1 mb-2 {{ \Route::is('userTesti.index') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('userTesti.index') }}">Testimoni</a>
                    </li>
                </ul>
                @if(Auth::check())
                <ul class="navbar-nav">
                    <li class="nav-item mx-2 mt-2 {{ \Route::is('cart.index') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('cart.index') }}"><i class="fa-solid fa-cart-shopping fa-xl text-white"></i></a>
                    </li>
                    <li class="nav-item mx-2 mt-2 {{ \Route::is('order.index') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('order.index') }}"><i class="fa-solid fa-box fa-xl text-white"></i></a>
                    </li>
                    <li class="nav-item mx-2 mt-2 {{ \Route::is('profile-show') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('profile-show') }}"><i class="fa-solid fa-circle-user fa-xl text-white"></i></a>
                    </li>
                </ul>
                @else
                <ul class="navbar-nav">
                    <li class="nav-item mx-2 mt-2">
                        <a class="btn btn-outline-warning fw-bold rounded-4 border-3" href="{{ route('login') }}">Login Sekarang</a>
                    </li>
                </ul>
                @endif
            </div>
        </div>
    </nav>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz4fnFO9gybBPLrAOsGMZHBjygI7F/3Gf8A/t7Bmsxk7642xczO9FLEXdI" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-pZjw8f+ua7Kw1TIqH4HG8PHTugwV0A9aPj3fQ7czE9i1T9z8v7RT/Gvj8tJFcE1i" crossorigin="anonymous"></script>
    <script src="{{ asset('assets/js/alert.js') }}"></script>
</body>