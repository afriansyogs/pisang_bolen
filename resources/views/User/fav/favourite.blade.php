@extends('User/menu/layout')

@section('content')


<div class="row justify-content-center text-center" id="product">

    <div class="col-12">
        <div class="main-txt">
            <h1>MY <span>FAVOURITE</span></h1>
        </div>
    </div>
    <!-- <div class="col-4">
        <div class="card my-3">
            <img src="img/produk.jpg" class="card-img-top" alt="Bolen Jonegoroan">
            <div class="card-body">
                <h4 class="card-title"><strong>Coklat</strong></h4>
                <p class="card-text">Perpaduan <b>Pisang</b> dan <b>Coklat</b> yang lumer dan dibalut dengan kulit yang krispi</p>
                <h5>Rp. 100.000</h5>
                <a href="#cart" class="btn btn-outline-primary mt-2"><i class="bi bi-cart-fill"></i></a>
            </div>
        </div>
    </div> -->

    <!-- <div class="" id="slider">
        <input type="radio" name="slider" id="slide1" checked>
        <input type="radio" name="slider" id="slide2">
        <input type="radio" name="slider" id="slide3">
        <div id="slides">
            <div id="overflow">
                <div class="inner">
                    <div class="slide slide_1">
                        <div class="slide-content">
                            <div class="col-4">
                                <div class="card my-3">
                                    <img src="img/produk.jpg" class="card-img-top" alt="Bolen Jonegoroan">
                                    <div class="card-body">
                                        <h4 class="card-title"><strong>Coklat</strong></h4>
                                        <p class="card-text">Perpaduan <b>Pisang</b> dan <b>Coklat</b> yang lumer dan dibalut dengan kulit yang krispi</p>
                                        <h5>Rp. 100.000</h5>
                                        <a href="#cart" class="btn btn-outline-primary mt-2"><i class="bi bi-cart-fill"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="slide slide_1">
                        <div class="slide-content">
                            <div class="col-4">
                                <div class="card my-3">
                                    <img src="img/produk.jpg" class="card-img-top" alt="Bolen Jonegoroan">
                                    <div class="card-body">
                                        <h4 class="card-title"><strong>Coklat Keju</strong></h4>
                                        <p class="card-text">Perpaduan <b>Pisang</b> dan <b>Coklat</b> yang lumer dan dibalut dengan kulit yang krispi</p>
                                        <h5>Rp. 100.000</h5>
                                        <a href="#cart" class="btn btn-outline-primary mt-2"><i class="bi bi-cart-fill"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="slide slide_3">
                        <div class="slide-content">
                            <div class="col-4">
                                <div class="card my-3">
                                    <img src="img/produk.jpg" class="card-img-top" alt="Bolen Jonegoroan">
                                    <div class="card-body">
                                        <h4 class="card-title"><strong>Keju</strong></h4>
                                        <p class="card-text">Perpaduan <b>Pisang</b> dan <b>Coklat</b> yang lumer dan dibalut dengan kulit yang krispi</p>
                                        <h5>Rp. 100.000</h5>
                                        <a href="#cart" class="btn btn-outline-primary mt-2"><i class="bi bi-cart-fill"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="controls">
            <label for="slide1"></label>
            <label for="slide2"></label>
            <label for="slide3"></label>
        </div>
        <div id="bullets">
            <label for="slide1"></label>
            <label for="slide2"></label>
            <label for="slide3"></label>
        </div>
    </div> -->


    <!-- <div class="slide-container">
        <div class="slide-content">
            <div class="col-4">
            <div class="card my-3">
                <div class="card-img">
                    <img src="img/produk.jpg" class="card-img-top" alt="Bolen Jonegoroan">  
                </div>
                <div class="card-body">
                    <h4 class="card-title"><strong>Coklat</strong></h4>
                    <p class="card-text">Perpaduan <b>Pisang</b> dan <b>Coklat</b> yang lumer dan dibalut dengan kulit yang krispi</p>
                    <h5>Rp. 100.000</h5>
                    <a href="#cart" class="btn btn-outline-primary mt-2"><i class="bi bi-cart-fill"></i></a>
                </div>
            </div>
            </div>
        </div>
    </div> -->


<!-- <div id="carouselExampleIndicators" class="carousel slide">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
    <div class="col">
        <div class="card my-3">
                <img src="img/produk.jpg" class="card-img-top" alt="Bolen Jonegoroan">
                <div class="card-body">
                    <h4 class="card-title"><strong>Coklat</strong></h4>
                    <p class="card-text">Perpaduan <b>Pisang</b> dan <b>Coklat</b> yang lumer dan dibalut dengan kulit yang krispi</p>
                    <h5>Rp. 100.000</h5>
                    <a href="#cart" class="btn btn-outline-primary mt-2"><i class="bi bi-cart-fill"></i></a>
                    <a href="{{ route('fav.index') }}" class="btn btn-outline-danger mt-2"><i class="bi bi-heart-fill"></i></a>
                </div>
            </div>
        </div>
    </div>
    <div class="carousel-item">
        <div class="col">
            <div class="card my-3">
                <img src="img/produk.jpg" class="card-img-top" alt="Bolen Jonegoroan">
                <div class="card-body">
                    <h4 class="card-title"><strong>Coklat Keju</strong></h4>
                    <p class="card-text">Perpaduan <b>Pisang</b> dan <b>Coklat Keju</b> yang lumer dan dibalut dengan kulit yang krispi</p>
                    <h5>Rp. 100.000</h5>
                    <a href="#cart" class="btn btn-outline-primary mt-2"><i class="bi bi-cart-fill"></i></a>
                    <a href="{{ route('fav.index') }}" class="btn btn-outline-danger mt-2"><i class="bi bi-heart-fill"></i></a>
                </div>
            </div>
        </div>
    </div>
    <div class="carousel-item">
        <div class="col">
            <div class="card my-3">
                <img src="img/produk.jpg" class="card-img-top" alt="Bolen Jonegoroan">
                <div class="card-body">
                    <h4 class="card-title"><strong>Keju</strong></h4>
                    <p class="card-text">Perpaduan <b>Pisang</b> dan <b>Keju</b> yang lumer dan dibalut dengan kulit yang krispi</p>
                    <h5>Rp. 100.000</h5>
                    <a href="#cart" class="btn btn-outline-primary mt-2"><i class="bi bi-cart-fill"></i></a>
                    <a href="{{ route('fav.index') }}" class="btn btn-outline-danger mt-2"><i class="bi bi-heart-fill"></i></a>
                </div>
            </div>
        </div>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div> -->


</div>

@endsection