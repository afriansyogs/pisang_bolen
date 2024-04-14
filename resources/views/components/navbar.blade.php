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
                <li class="nav-item mx-1 {{ \Route::is('dasboard') ? 'active' : '' }}">
                    <a class="nav-link rounded rounded-3" aria-current="page" href="/dasboard">Home</a>
                </li>
                <li class="nav-item mx-1 {{ \Route::is('menu.index') ? 'active' : '' }}">
                    <a class="nav-link rounded rounded-3" href="{{ route('menu.index') }}">About</a>
                </li>
                <li class="nav-item mx-1 {{ \Route::is('saran.index') ? 'active' : '' }}">
                    <a class="nav-link rounded rounded-3" href="{{ route('saran.index') }}">Contact</a>
                </li>
                <li class="nav-item mx-1">
                    <a class="nav-link rounded rounded-3" href="Cerita4/oncerita4.html">Menu</a>
                </li>
            </ul>
        </div>
    </div>
</nav>