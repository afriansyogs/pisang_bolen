<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>| PISANG BOLEN |</title>

    <!-- BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <!-- BOOTSTRAP ICONS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- font awasome -->
    <script src="https://kit.fontawesome.com/f9189b0d8d.js" crossorigin="anonymous"></script>
    <!-- CSS -->
    <link rel="stylesheet" href="css/produk.css">
    <link rel="stylesheet" href="{{ asset('/assets/css/navbar.css') }}">
    {{-- JS --}}
    {{-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script> --}}
</head>
<body>

<!-- NAVBAR -->





<nav class="navbar navbar-expand-lg fixed-top bg-transparent">
   <div class="container">
       <div class="nav_img ms-1">
           <img src="{{ asset('assets/img/logo_bolen.png') }}" class="nav_first_img" alt="">
       </div>
       <button class="navbar-toggler border-2 border-black" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
           <span class="navbar-toggler-icon"></span>
       </button>
       <div class="collapse navbar-collapse" id="navbarNav">
           <ul class="navbar-nav fs-5 font-weight-bold border-dark mx-auto">
               <li class="nav-item  mx-1 mb-2 {{ \Route::is('dasboard.index') ? 'active' : '' }}">
                   <a class="nav-link" href="{{ route('dasboard.index') }}">Home</a>
               </li>
               <li class="nav-item mx-1 mb-2">
                   <a class="nav-link" href="Cerita4/oncerita4.html">About</a>
               </li>
               <li class="nav-item mx-1 mb-2 {{ \Route::is('Produk.index') ? 'active' : '' }}">
                   <a class="nav-link" href="{{ route('Produk.index') }}">Menu</a>
               </li>
               <li class="nav-item mx-1 mb-2 {{ \Route::is('userTesti.index') ? 'active' : '' }}">
                   <a class="nav-link" href="{{ route('userTesti.index') }}">Testimoni</a>
               </li>
           </ul>

           <ul class="navbar-nav">
               <li class="nav-item mx-2 mt-2 {{ \Route::is('cart.index') ? 'active' : '' }}">
                   <a class="nav-link" href="{{ route('cart.index') }}"><i class="fa-solid fa-cart-shopping fa-xl text-white"></i></a>
               </li>
               <li class="nav-item mx-2 mt-2 {{ \Route::is('profile-show') ? 'active' : '' }}">
                   <a class="nav-link" href="{{ route('profile-show') }}"><i class="fa-solid fa-box fa-xl text-white"></i></a>
               </li>
               <li class="nav-item mx-2 mt-2 {{ \Route::is('profile-show') ? 'active' : '' }}">
                   <a class="nav-link" href="{{ route('profile-show') }}"><i class="fa-solid fa-circle-user fa-xl text-white"></i></a>
               </li>
           </ul>

       </div>
   </div>
</nav>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="{{ asset('assets/js/alert.js') }}"></script>




<!-- PRODUK -->
<div class="container mt-5">
    @yield('content')
</div>

</body>
</html>
