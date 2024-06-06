<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Testimoni</title>
    
    <!-- CAROUSEL -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <!-- BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <!-- CSS -->
    <link rel="stylesheet" href="css/testimoni.css">
    <link rel="stylesheet" href="{{ asset('/assets/css/navbar.css') }}">
</head>

<body>
    <x-navbar />
    <div class="isi">
        <div class="testi">
            <h1>TESTIMONIAL</h1>    
        </div>
        <div class="container-2">
            <div class="owl-carousel owl-theme">
                @foreach ($testi as $user)
                <div class="item">
                    <div class="content">
                        <div class="img-area">
                            <img src="img/testi1.png" alt="">
                        </div>
                        <div class="text-content">
                            <p class="mt-3">{{ $user->testi }}</p> 
                            <h4>{{ $user->name }}</h4>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <br>
            <br>
        </div>
    </div>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script>
        $('.owl-carousel').owlCarousel({
            loop: true,
            margin: 20,
            nav: false,
            dots: true,
            autoplay: true,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 2
                },
                1000: {
                    items: 3
                }
            }
        });
    </script>
</body>

</html>
