<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- link bootstrap  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- link font awasome -->
    <script src="https://kit.fontawesome.com/f9189b0d8d.js" crossorigin="anonymous"></script>

    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <!-- link css  -->
    <link rel="stylesheet" href="{{ asset('/assets/css/navbar.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/css/dashboard.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/css/footer.css') }}">

</head>

<body>
    <x-navbar />

    <section class="dashboard w-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="text text-white mt-5 ms-5 pt-5">

                    @if (session('success'))
                        <div id="closeAlert" class="alert alert-success alert-dismissible fade show text position-absolute end-0 z-2 me-5" role="alert">
                            <strong>{{ session('success') }}</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    @if (session('failed'))
                        <div id="closeAlert" class="alert alert-danger alert-dismissible fade show text position-absolute end-0 z-2 me-5" role="alert">
                            <strong>{{ session('failed') }}</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif



                        <div class="content">
                            <h1 class="">BOLEN</h1>
                            <h1 class="">JONEGOROAN</h1>
                            <h5 class="">Rasa coklat dan kejunya yang lumer bisa bikin ketagihan loh, Penasaran rasanya gimana? Rasakan sendiri sensasinya!</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="content_img text-center mx-auto">
                        <img src="{{ asset('assets/img/bolen-obj.png') }}" class="img-fluid" alt="Gambar">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="main">
            @yield('content')
        </div>
    <!-- <section class="section1 w-full"></section> -->
    @component('components.user.footer')
    @endcomponent

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="{{ asset('assets/js/alert.js') }}"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
  AOS.init();
</script>
</body>

</html>
