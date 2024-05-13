<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>testimoni</title>

    <!-- CAROUSEL -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <!-- BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <!-- CSS -->
    <link rel="stylesheet" href="css/testimoni2.css">
    <link rel="stylesheet" href="{{ asset('/assets/css/navbar.css') }}">
    
</head>

<body>
  <x-navbar />
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
          @foreach ($testi as $user)
                <li>{{ $user->testi }}</li> 
          @endforeach
            
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
