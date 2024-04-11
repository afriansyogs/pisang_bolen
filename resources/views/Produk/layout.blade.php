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
    <!-- CSS -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<!-- NAVBAR -->
<nav class="navbar p-3 navbar-expand-lg" style="background-color: rgba(217, 173, 2, 0.1);">
    <div class="container-fluid">
        <div class="img">
            <img src="img/logo_bolen.png" alt="" width="80px">
        </div>
        <div class="icon justify-content-left">
            <a class="navbar-brand" href="#profile">
            <i class="bi bi-person-circle"></i>
            </a>
            <a class="navbar-brand" href="#cart">
            <i class="bi bi-cart-fill"></i>
            </a>
            <a class="navbar-brand" href="">
            <i class="bi bi-heart"></i>
            </a>
        </div>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="#home">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#aboutus">About Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link act" href="{{ route('Produk.index') }}">Product</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#testimoni">Testimonial</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('saran.saran') }}">Saran</a>
                </li>
            </ul>
            <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-dark" type="submit"><i class="bi bi-search"></i></button>
            </form>
        </div>
    </div>
</nav>



<!-- PRODUK -->
<div class="container mt-5">
    @yield('content')
</div>

</body>
</html>
