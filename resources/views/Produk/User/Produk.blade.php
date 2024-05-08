@extends('Produk/layout')

@section('content')

<div class="row justify-content-center text-center">

    <div class="col-12">
        <div class="main-txt">
            <h1>OUR <span>PRODUCTS</span></h1>
        </div>
    </div>
    {{-- @foreach ($products as $no => $pdk )
        <div class="col">
            <div class="card my-3">
                {{-- <img src="img/produk.jpg" class="card-img-top" alt="Bolen Jonegoroan">
                <img src="{{ asset('storage/images/' . $pdk->foto_product) }}" class="card-img-top" alt="Bolen Jonegoroan">
                <div class="card-body">
                    <h4 class="card-title"><strong> {{ $pdk->variant_product }} </strong></h4>
                    {{-- <p class="card-text">Perpaduan <b>Pisang</b> dan <b>Coklat</b> yang lumer dan dibalut dengan kulit yang krispi</p>
                    <p class="card-text"> {{ $pdk->description_product }} </p>
                    <h5> {{ $pdk->harga_product }} </h5>
                    <form action="{{ route('Produk.unfav', ['slug_link' => $pdk->slug_link]) }}" method="POST">
                        @csrf
                        @method('POST')
                        <button type="submit" class="btn btn-outline-danger mt-2">
                            <i class="bi bi-heart-fill"></i>
                        </button>
                    </form>
                    <a href="#cart" class="btn btn-outline-primary mt-2"><i class="bi bi-cart-fill"></i></a>
                    {{-- <a href=""name="aksi" value="fav" class="btn btn-outline-danger mt-2"><i class="bi bi-heart-fill"></i></a>
                </div>
            </div>
        </div>
    @endforeach --}}


    <div class="col">
        <div class="card my-3">
            <img src="img/produk.jpg" class="card-img-top" alt="Bolen Jonegoroan">
            <div class="card-body">
                <h4 class="card-title"><strong>Coklat</strong></h4>
                <p class="card-text">Perpaduan <b>Pisang</b> dan <b>Coklat</b> yang lumer dan dibalut dengan kulit yang krispi</p>
                <h5>Rp. 100.000</h5>
                <a href="#cart" class="btn btn-outline-primary mt-2"><i class="bi bi-cart-fill"></i></a>
                <a href=""name="aksi" value="fav" class="btn btn-outline-danger mt-2"><i class="bi bi-heart-fill"></i></a>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card my-3">
            <img src="img/produk.jpg" class="card-img-top" alt="Bolen Jonegoroan">
            <div class="card-body">
                <h4 class="card-title"><strong>Coklat Keju</strong></h4>
                <p class="card-text">Perpaduan <b>Pisang</b> dan <b>Coklat Keju</b> yang lumer dan dibalut dengan kulit yang krispi</p>
                <h5>Rp. 100.000</h5>
                <a href="#cart" class="btn btn-outline-primary mt-2"><i class="bi bi-cart-fill"></i></a>
                <a href="" name="aksi" value="fav" class="btn btn-outline-danger mt-2"><i class="bi bi-heart-fill"></i></a>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card my-3">
            <img src="img/produk.jpg" class="card-img-top" alt="Bolen Jonegoroan">
            <div class="card-body">
                <h4 class="card-title"><strong>Keju</strong></h4>
                <p class="card-text">Perpaduan <b>Pisang</b> dan <b>Keju</b> yang lumer dan dibalut dengan kulit yang krispi</p>
                <h5>Rp. 100.000</h5>
                <a href="#cart" class="btn btn-outline-primary mt-2"><i class="bi bi-cart-fill"></i></a>
                <a href="" name="aksi" value="fav" class="btn btn-outline-danger mt-2"><i class="bi bi-heart-fill"></i></a>
            </div>
        </div>
    </div>


</div>


@endsection
