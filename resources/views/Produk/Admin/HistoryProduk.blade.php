@extends('Produk/Admin/Layout')

@section('content')


<div class="row justify-content-center text-center">


    <div class="col-12">
        <div class="main-txt">
            <h1>OUR <span>PRODUCTS</span></h1>
        </div>
    </div>

    <div class="col-12">
        <a href="{{ route('Admin.admin') }}" class="btn btn-success btn-sm">Produk</a>
        <a href="{{ route('Admin.history') }}" class="btn btn-dark btn-sm">History</a>
    </div>

    {{-- @foreach ($products as $pdk )
        <div class="col-4">
            <div class="card my-4">
                <img src="{{ asset('storage/images/' . $pdk->foto_product) }}" class="card-img-top" alt="Bolen Jonegoroan">
                <div class="card-body">
                    <h4 class="card-title"><strong> {{ $pdk->variant_product }} </strong></h4>
                    <p class="card-text"> {{ $pdk->description_product }} </p>
                    <h5> {{ $pdk->harga_product }} </h5>
                    <p> {{ $pdk->jumlah_product }} </p>
                    {{-- <p> {{ $pdk->status_publish }} </p>
                </div>
            </div>
        </div>
    @endforeach --}}


</div>


@endsection
