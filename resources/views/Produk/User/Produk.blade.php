@extends('Produk/layout')

@section('content')

<div class="row justify-content-center text-center">

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
            <img src="{{ asset('storage/images/' . $pdk->foto_product) }}" class="card-img-top" alt="Bolen Jonegoroan">
            <div class="card-body">
                <h4 class="card-title"><strong>{{ $pdk->variant_product }}</strong></h4>
                {{-- <p class="card-text">{{ $pdk->description_product }}</p> --}}
                <h5>{{ $pdk->harga_product }}</h5>
            </div>
            <a href="{{ route('Produk.show', $pdk->slug_link) }}" name="detail-produk" value="detail-produk" class="btn"></i>Show Details</a>
        </div>
    </div>
    @endforeach

    {{-- <div class="col-4">
        <div class="card my-4">
            <img src="img/produk.jpg" class="card-img-top" alt="Bolen Jonegoroan">
            <div class="card-body">
                <h4 class="card-title"><strong>Coklat Keju</strong></h4>
                <p class="card-text">Perpaduan <b>Pisang</b> dan <b>Coklat Keju</b> yang lumer dan dibalut dengan kulit yang krispi</p>
                <h5>Rp. 100.000</h5>
                <a href="" name="cart" value="add-cart" class="btn btn-outline-dark mt-3"><i class="bi bi-cart-fill"></i> Add to Cart</a>
            </div>
        </div>
    </div>
    <div class="col-4">
        <div class="card my-4">
            <img src="img/produk.jpg" class="card-img-top" alt="Bolen Jonegoroan">
            <div class="card-body">
                <h4 class="card-title"><strong>Keju</strong></h4>
                <p class="card-text">Perpaduan <b>Pisang</b> dan <b>Keju</b> yang lumer dan dibalut dengan kulit yang krispi</p>
                <h5>Rp. 100.000</h5>
                <a href="" name="cart" value="add-cart" class="btn btn-outline-dark mt-3"><i class="bi bi-cart-fill"></i> Add to Cart</a>
            </div>
        </div>
    </div> --}}


</div><br>


@endsection
