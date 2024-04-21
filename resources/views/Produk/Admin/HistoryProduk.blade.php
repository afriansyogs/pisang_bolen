@extends('Produk/layout')

@section('content')

<div class="container">

    <div class="col-10">
        <a href="{{ route('Admin.admin') }}" class="btn btn-success btn-sm"> Produk</a> >>
        <a href="{{ route('Admin.history') }}" class="btn btn-dark btn-sm"> History</a>
    </div>


    <div class="col-12">
        <div class="main-txt">
            <h1>OUR <span>PRODUCTS</span></h1>
        </div>
    </div>
    <div class="col">
        <div class="card my-3">
            @foreach ($products as $pdk )
            <img src="{{ asset('storage/images/' . $pdk->foto_product) }}" class="card-img-top" alt="Bolen Jonegoroan">
            <div class="card-body">
                <h4 class="card-title"><strong> {{ $pdk->variant_product }} </strong></h4>
                <p class="card-text"> {{ $pdk->description_product }} </p>
                <h5> {{ $pdk->harga_product }} </h5>
                <p> {{ $pdk->jumlah_product }} </p>
                <td> {{ $pdk->status_publish }} </td>
                <a href="#cart" class="btn btn-outline-primary mt-2"><i class="bi bi-cart-fill"></i></a>
                <a href="#fav"name="aksi" value="fav" class="btn btn-outline-danger mt-2"><i class="bi bi-heart-fill"></i></a>

                <a href="{{route('Admin.edit', $pdk->slug_link)}}" name="aksi" value="edit" class="btn btn-outline-success mt-2"><i class="bi bi-pencil-square"></i></a>
                <a href="{{route('Admin.hapus', $pdk->alug_link)}}"name="aksi" value="hapus" class="btn btn-outline-danger mt-2"><i class="bi bi-trash3"></i></a>
            </div>
        </div>
    </div>


</div>



@endsection
