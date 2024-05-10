@extends('Produk/layout')

@section('content')

<div class="row justify-content-center text-center" id="product">


    <div class="col-12">
        <div class="main-txt">
            <h1>MY <span>FAVORITE</span></h1>
        </div>
    </div>

        {{-- <div class="col">
            <div class="card my-3">
                {{-- <img src="img/produk.jpg" class="card-img-top" alt="Bolen Jonegoroan"> --}
                <img src="{{ asset('storage/images/' . $products->foto_product) }}" class="card-img-top" alt="Bolen Jonegoroan">
                <div class="card-body">
                    <h4 class="card-title"><strong> {{ $products->variant_product }} </strong></h4>
                    {{-- <p class="card-text">Perpaduan <b>Pisang</b> dan <b>Coklat</b> yang lumer dan dibalut dengan kulit yang krispi</p> --}
                    <p class="card-text"> {{ $products->description_product }} </p>
                    <h5> {{ $products->harga_product }} </h5>
                    <form action="" method="POST">
                        @csrf
                        @method('POST')
                        <button type="submit" class="btn btn-outline-danger mt-2">
                            <i class="bi bi-heart-fill"></i>
                        </button>
                    </form>
                    <a href="#cart" class="btn btn-outline-primary mt-2"><i class="bi bi-cart-fill"></i></a>
                    {{-- <a href=""name="aksi" value="fav" class="btn btn-outline-danger mt-2"><i class="bi bi-heart-fill"></i></a> --}
                </div>
            </div>
        </div> --}}


</div>

@endsection
