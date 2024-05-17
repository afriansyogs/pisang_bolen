@extends('Produk/layout')

@section('content')

<style>
    .link a, span {
        text-decoration: none;
        /* color: #d9ad02; */
        color: #5c1d0d;
        margin: 5px;
        transition: 0.2s ease;
        font-size: 20px
    }
    .link a:hover {
        color: #d9ad02;
        transition: 0.2s ease;
    }
    .container .card:hover{
        scale: unset;
        /* box-shadow: 0px 3px 8px #5c1d0d; */
        box-shadow: none;
    }
    .container .card {
        padding: 1.3%;
        margin: auto;
        /* box-shadow: 0px 3px 8px #5c1d0d; */
        display: grid;
        box-shadow: none;
        border: none;
    }
    .container .card-body {
        display: flex;
        justify-content: center;
        text-align: justify;
    }
    .card .row img {
        border-radius: unset;
        border-radius: unset;
        margin: auto;
    }
    .card .row .btn {
        width: 50%;
    }
    .card .row .isi {
        align-content: center;
        background-color: rgba(217, 173, 2, 0.1);
        border: 2px dashed #d9ad02;
    }
    .card .row .foto {
        align-content: center;
        justify-content: center;
    }


    @media only screen and (max-width: 990px) {
        .link a, span {
            font-size: 17px;
        }
        .card .row .isi {
            margin: 0;
        }
        .card .row .foto {
            margin-bottom: 20px;
            padding: 0;
        }
        .card .row .btn {
            width: 100%;
        }
    }
</style>

<div class="row">


    <div class="col-12 link">
        <a href="/">Home</a>
        <span> | </span>
        <a href="{{ route('Produk.index') }}">Product</a>
        <span> | </span>
        <a href="{{ route('Produk.show', $products->slug_link) }}" class="mt-2" value="detail-produk">{{ $products->variant_product }}</a>
    </div>

    <div class="container mt-3 mb-5">
        <div class="row g-0">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            {{-- <div class="col-md-12 mb-3">
                                <h2 class="card-title text-center fw-bold">{{ $products->variant_product }}</h2>
                            </div> --}}
                            <div class="foto col-md-6">
                                <img src="{{ asset('storage/images/' . $products->foto_product) }}" class="card-img-top" alt="Bolen Jonegoroan">
                            </div>
                            <div class="isi col-md-6 p-4 justify-content-center">
                                <h2 class="card-title fw-bold mb-4">{{ $products->variant_product }}</h2>
                                <p class="card-text mb-4">{{ $products->description_product }}</p>
                                <hr>
                                <h5 class="card-text mt-4 mb-3">{{ $products->harga_product }}</h5>
                                <a href="" class="btn btn-outline-dark mt-3"><i class="bi bi-cart-fill"></i> Add to Cart</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>

@endsection
