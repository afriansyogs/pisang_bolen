@extends('User/testi/layout2')

@section('content')

<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
<link rel="stylesheet" href="css/testimoni2.css">
</head>

<body>
<div class="judul">
  <h1>TESTIMONIAL</h1>
</div>
<div class="container-2">
<div class="owl-carousel owl-theme">
    <div class="item">
      <div class="content">
        <div class="img-area">
          <img src="img/testi1.png" alt="">
        </div>
        <div class="text-content">
          <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Minima fugit expedita voluptatem debitis cumque cum dolores, distinctio molestias eveniet voluptas voluptatum iure aspernatur rem sit voluptatibus inventore et reprehenderit a.</p>
          <h2>helga olivia</h2>
        </div>
      </div>
    </div>
    <div class="item">
      <div class="content">
        <div class="img-area">
          <img src="img/testi2.png" alt="">
        </div>
        <div class="text-content">
          <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Minima fugit expedita voluptatem debitis cumque cum dolores, distinctio molestias eveniet voluptas voluptatum iure aspernatur rem sit voluptatibus inventore et reprehenderit a.</p>
          <h2>helga olivia</h2>
        </div>
      </div>
    </div>
    <div class="item">
      <div class="content">
        <div class="img-area">
          <img src="img/testi3.png" alt="">
        </div>
        <div class="text-content">
          <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Minima fugit expedita voluptatem debitis cumque cum dolores, distinctio molestias eveniet voluptas voluptatum iure aspernatur rem sit voluptatibus inventore et reprehenderit a.</p>
          <h2>helga olivia</h2>
        </div>
      </div>
    </div>
    <div class="item">
      <div class="content">
        <div class="img-area">
          <img src="img/testi3.png" alt="">
        </div>
        <div class="text-content">
          <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Minima fugit expedita voluptatem debitis cumque cum dolores, distinctio molestias eveniet voluptas voluptatum iure aspernatur rem sit voluptatibus inventore et reprehenderit a.</p>
          <h2>helga olivia</h2>
        </div>
      </div>
    </div>
    <div class="item">
      <div class="content">
        <div class="img-area">
          <img src="img/testi3.png" alt="">
        </div>
        <div class="text-content">
          <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Minima fugit expedita voluptatem debitis cumque cum dolores, distinctio molestias eveniet voluptas voluptatum iure aspernatur rem sit voluptatibus inventore et reprehenderit a.</p>
          <h2>helga olivia</h2>
        </div>
      </div>
    </div>
    
    
    
</div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

<script>
  $('.owl-carousel').owlCarousel({
    loop:true,
    margin:10,
    nav:false,
    dots:true,
    autoplay:true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:2
        },
        1000:{
            items:3
        }
    }
})
</script>
</body>

@endsection