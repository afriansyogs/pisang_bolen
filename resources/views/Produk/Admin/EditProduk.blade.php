@extends('Produk/layout')

@section('content')

<div class="container">

    {{-- <div class="col-10">
        <a href="{{ route('Admin.admin') }}" class="btn btn-success btn-sm">Kategori</a> >>
        <a href="{{ route('Admin.history') }}" class="btn btn-dark btn-sm">History</a>
    </div> --}}


    <form method="POST" action="{{ route('Admin.update', $products->slug_link) }}}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3 row mt-5">
            <label for="foto" class="col-sm-2 col-form-label">Foto Produk</label>
            <div class="col-sm-10">
                <input required type="file" name="foto_product" class="form-control @error('foto_product') is-invalid @enderror" id="foto" placeholder="ex: " value="">
                @error('foto_product')
                <div class="alert alert-danger mt-2">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
        <div class="mb-3 row mt-3">
            <label for="variant" class="col-sm-2 col-form-label">Variant</label>
            <div class="col-sm-10">
                <input required type="text" name="variant_product" class="form-control @error('variant_product') is-invalid @enderror" id="variant" placeholder="ex: Coklat" value="">
                @error('variant_product')
                <div class="alert alert-danger mt-2">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
        <div class="mb-3 row">
            <label for="deskripsi" class="col-sm-2 col-form-label">Deskripsi</label>
            <div class="col-sm-10">
                <input required type="text" name="description_product" class="form-control @error('description_product') is-invalid @enderror" id="deskripsi" placeholder="ex: " value="">
                @error('description_product')
                <div class="alert alert-danger mt-2">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
        <div class="mb-3 row">
            <label for="harga" class="col-sm-2 col-form-label">Harga Produk</label>
            <div class="col-sm-10">
                <input required type="text" name="harga_product" class="form-control @error('harga_product') is-invalid @enderror" id="harga" placeholder="ex: Rp. 100.000" value="">
                @error('harga_product')
                <div class="alert alert-danger mt-2">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
        <div class="mb-3 row">
            <label for="jumlah" class="col-sm-2 col-form-label">Jumlah Produk</label>
            <div class="col-sm-10">
                <input required type="number" name="jumlah_product" class="form-control @error('jumlah_product') is-invalid @enderror" id="jumlah" placeholder="ex: 300" value="">
                @error('jumlah_product')
                <div class="alert alert-danger mt-2">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
        <div class="form-group  mb-3 row">
            <label for="status" class="font-weight-bold col-sm-2 col-form-label">Status Publish</label>
            <div class="col-sm-10">
                <select required name="status_publish" id="status" class="form-control @error('status_publish') is-invalid @enderror">
                    <option value=""></option>
                    <option value="Draft">Draft</option>
                    <option value="Publish">Publish</option>
                </select>
                @error('status_publish')
                <div class="alert alert-danger mt-2">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
        <div class="mb-3 row mt-5">
            <div class="col">
                <button type="submit" name="aksi" value="edit" class="btn btn-success"><i class="bi bi-save"></i> Simpan</button>
                <a href=" {{ route('Admin.admin') }} " type="button" class="btn btn-danger"><i class="bi bi-arrow-left-square"></i> Batal</a>
            </div>
        </div>

  </form>


</div>



@endsection
