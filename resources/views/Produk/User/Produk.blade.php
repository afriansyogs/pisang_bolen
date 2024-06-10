<head>
    <title>Produk</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/produk.css">
</head>

<x-navbar />
<br><br><br><br>
<div class="row produk_body justify-content-center text-center">


    <div class="col-12">
        <div class="main-txt">
            <h1>OUR <span>PRODUCTS</span></h1>
        </div>
    </div>
<hr>
    @foreach ($products as $pdk)
    <div class="col-4">
        <a href="{{ route('Produk.show', $pdk->slug_link) }}" class="text-decoration-none text-dark">
        <div class="card my-4">
            <div class="foto">
                <img src="{{ asset('storage/images/' . $pdk->foto_product) }}" class="card-img-top" alt="Bolen Jonegoroan">
            </div>
            <div class="card-body">
                <h4 class="card-title"><strong>{{ $pdk->variant_product }}</strong></h4>
                {{-- <p class="card-text">{{ $pdk->description_product }}</p> --}}
                <h5>{{ $pdk->harga_product }}</h5>
            </div>
            <a href="{{ route('Produk.show', $pdk->slug_link) }}" name="detail-produk" value="detail-produk" class="btn"></i>Show Details</a>
        </div>
    </div>
    @endforeach


</div>



