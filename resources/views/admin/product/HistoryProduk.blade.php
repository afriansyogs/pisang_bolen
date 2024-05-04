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
                </div>
            </div>
        </div>
    @endforeach --}}





    <div class="col-12">
        <table id="example" class="table table-striped" style="width:100%">
            <thead>
                <tr>
                    <th data-priority="1">No</th>
                    <th>Foto Produk</th>
                    <th data-priority="1">Variant Produk</th>
                    <th>Deskripsi Produk</th>
                    <th data-priority="1">Harga Produk</th>
                    <th>Jumlah Produk</th>
                    <th data-priority="1">Aksi</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($products as $no => $pdk )

                <tr>
                    <td> {{ ++$no }} </td>
                    <td> <img src="{{ asset('storage/images/' . $pdk->foto_product) }}" class="card-img-top" alt="Bolen Jonegoroan" style="width: 160px"> </td>
                    <td> {{ $pdk->variant_product }} </td>
                    <td> {{ $pdk->description_product }} </td>
                    <td> {{ $pdk->harga_product }} </td>
                    <td> {{ $pdk->jumlah_product }} </td>
                    <td>
                        <a href="{{route('Admin.edit', $pdk->slug_link)}}" value="edit" class="btn btn-outline-success mt-2"><i class="bi bi-pencil-square"></i></a>
                        <a href="{{route('Admin.hapus', $pdk->slug_link)}}" value="hapus" class="btn btn-outline-danger mt-2"><i class="bi bi-trash3"></i></a>
                    </td>
                </tr>
                @endforeach
            </tbody>

            <tfoot>
                <tr>
                    <th>No</th>
                    <th>Foto Produk</th>
                    <th>Variant Produk</th>
                    <th>Deskripsi Produk</th>
                    <th>Harga Produk</th>
                    <th>Jumlah Produk</th>
                    <th>Aksi</th>
                </tr>
            </tfoot>
        </table>
    </div>


</div>


@endsection
