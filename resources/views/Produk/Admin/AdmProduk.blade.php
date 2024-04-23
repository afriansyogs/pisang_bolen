@extends('Produk/layout')

@section('content')

<div class="row justify-content-center text-center">


    <div class="col-12">
        <div class="main-txt">
            <h1>OUR <span>PRODUCTS</span></h1>
        </div>
    </div>


    <div class="col-12">
        <a href="{{ route('Admin.admin') }}" class="btn btn-success btn-sm">Produk</a> >>
        <a href="{{ route('Admin.history') }}" class="btn btn-dark btn-sm">History</a>
    </div>
    <div class="col-12 mt-4">
        <a href="{{ route('Admin.create') }}" class="btn btn-primary btn-sm"><i class="bi bi-square-plus"></i></i> Tambah</a>
    </div>


    <div class="col">
        @foreach ($products as $pdk )
        <div class="card my-3">
            <img src="{{ asset('storage/product/' . $pdk->foto_product) }}" class="card-img-top" alt="Bolen Jonegoroan">
            <div class="card-body">
                <h4 class="card-title"><strong> {{ $pdk->variant_product }} </strong></h4>
                <p class="card-text"> {{ $pdk->description_product }} </p>
                <h5> {{ $pdk->harga_product }} </h5>
                <p> {{ $pdk->jumlah_product }} </p>
                <p> {{ $pdk->status_publish }} </p>

                <a href="{{route('Admin.edit', $pdk->slug_link)}}" name="aksi" value="edit" class="btn btn-outline-success mt-2"><i class="bi bi-pencil-square"></i></a>
                <a href="{{route('Admin.hapus', $pdk->slug_link)}}" name="aksi" value="hapus" class="btn btn-outline-danger mt-2"><i class="bi bi-trash3"></i></a>
            </div>
        </div>
    </div>
    @endforeach

</div>


@endsection