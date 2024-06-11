<head>
    <link rel="stylesheet" href="{{ asset('/assets/css/dashboard.css') }}">
    <!-- link bootstrap  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('/assets/css/navbar.css') }}">
    <style>
        /* Default styles for larger screens */
        
        .about-us-heading {
        font-size: 60px ;
    }
        
        @media (max-width: 576px) {
    .about-us-heading {
        font-size: 2.5rem !important;
    }

    .about-us-text {
        font-size: 3rem !important;
        color: black;
    }
}
    </style>
</head>

<section class="about_section">
    <x-navbar />
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="img_about" data-aos="fade-right" data-aos-anchor="#example-anchor" data-aos-offset="500" data-aos-duration="500">
                    <img src="{{ asset('assets/img/bln2.png') }}" alt="About Us Image" class="img-fluid rounded ">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="text_about text-white mt-5" data-aos="fade-left" data-aos-anchor="#example-anchor" data-aos-offset="500" data-aos-duration="500">
                    <h1 class="text-center fw-bolder about-us-heading pt-5">About Us</h1> <!-- pastikan class "about-us-heading" diterapkan di sini -->
                    <h4 class="mt-5 fw-semibold about-us-text">Berawal dari camilan rumahan yang digemari keluarga, UMKM Pisang Bolen Bojonegoro menjelma menjadi primadona kuliner masa kini. Didirikan pada tahun 2022, usaha ini merupakan wujud semangat wirausaha dan kecintaan terhadap cita rasa pisang bolen yang istimewa.</h4> <!-- pastikan class "about-us-text" diterapkan di sini -->
                    <h4 class="fw-semibold about-us-text mt-2">Awal mulanya, pisang bolen ini hanya dinikmati sebagai camilan biasa tanpa kemasan dan logo yang mencolok. Namun, tekad dan kegigihan sang pemilik tak pernah padam. Di penghujung tahun 2022, sebuah langkah berani diambil untuk membawa pisang bolen ini ke level yang lebih tinggi.</h4> <!-- pastikan class "about-us-text" diterapkan di sini -->
                    <h4 class="fw-semibold about-us-text mt-3">Hingga saat ini bolen tersebut dikenal dengan pisang bolenjonegoroan yang berproduksi di Kota Bojonegoro dan di distribusikan di Semarang.<span class="fw-bold text-warning border-white border-2"> Bolenjonegoroan akan terus berinovasi untuk kepuasan anda.</span></h4> <!-- pastikan class "about-us-text" diterapkan di sini -->
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
</section>
