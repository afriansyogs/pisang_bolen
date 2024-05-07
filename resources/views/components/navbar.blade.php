<nav class="navbar navbar-expand-lg fixed-top bg-transparent">
    <div class="container">
        <div class="nav_img ms-1">
            <img src="{{ asset('assets/img/logo_bolen.png') }}" class="nav_first_img" alt="">
        </div>
        <button class="navbar-toggler border-2 border-black" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav fs-5 font-weight-bold border-dark">
                <li class="nav-item  mx-1 {{ \Route::is('dasboard.index') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('dasboard.index') }}">Home</a>
                </li>
                <li class="nav-item mx-1">
                    <a class="nav-link" href="Cerita4/oncerita4.html">about</a>
                </li>
                <li class="nav-item mx-1 {{ \Route::is('Produk.index') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('Produk.index') }}">Menu</a>
                </li>
                <li class="nav-item mx-1 {{ \Route::is('userTesti.index') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('userTesti.index') }}">Testimoni</a>
                </li>
            </ul>
        </div>
    </div>
</nav>