@extends('Produk/Admin/Layout')

@section('content')

<div class="container">

    {{-- <div class="col-10">
        <a href="{{ route('Admin.admin') }}" class="btn btn-success btn-sm"> Produk</a> >>
        <a href="{{ route('Admin.hapus', $products->slug_link) }}" class="btn btn-dark btn-sm"> History</a>
    </div> --}}

    <div class="col-12">
        <br>
        <h5>Apakah anda yakin ingin menghapus ini ?</h5>

        <form method="POST" action="{{ route('Admin.softdelete', $products->slug_link) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group mb-3 row mt-5">
                <label for="foto" class="col-sm-2 col-form-label">Foto Produk</label>
                <div class="col-sm-10">
                    @if ($products->foto_product)
                            <img src="{{ asset('storage/images/' . $products->foto_product) }}" alt="Bolen Jonegoroan" class="img-fluid" style="width: 500px;">
                        @else
                            <p>Tidak ada gambar yang tersedia</p>
                    @endif
                    {{-- <input required type="file" name="foto_product" class="form-control @error('foto_product') is-invalid @enderror" id="foto" value="{{ asset('storage/images/' . $products->foto_product) }}"> --}}
                    @error('foto_product')
                    <div class="alert alert-danger mt-2">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>
            <div class="form-group mb-3 row mt-3">
                <label for="variant" class="col-sm-2 col-form-label">Variant</label>
                <div class="col-sm-10">
                    <input required type="text" name="variant_product" class="form-control @error('variant_product') is-invalid @enderror" id="variant" placeholder="ex: Coklat" value="{{ $products->variant_product }}">
                    @error('variant_product')
                    <div class="alert alert-danger mt-2">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>
            <div class="form-group mb-3 row">
                <label for="deskripsi" class="col-sm-2 col-form-label">Deskripsi</label>
                <div class="col-sm-10">
                    <input required type="text" name="description_product" class="form-control @error('description_product') is-invalid @enderror" id="deskripsi" value="{{ $products->description_product }}">
                    @error('description_product')
                    <div class="alert alert-danger mt-2">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>
            <div class="form-group mb-3 row">
                <label for="harga" class="col-sm-2 col-form-label">Harga Produk</label>
                <div class="col-sm-10">
                    <input required type="text" name="harga_product" class="form-control @error('harga_product') is-invalid @enderror" id="harga" placeholder="ex: 100.000" value="{{ $products->harga_product }}">
                    @error('harga_product')
                    <div class="alert alert-danger mt-2">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>
            <div class="form-group mb-3 row">
                <label for="jumlah" class="col-sm-2 col-form-label">Jumlah Produk</label>
                <div class="col-sm-10">
                    <input required type="number" name="jumlah_product" class="form-control @error('jumlah_product') is-invalid @enderror" id="jumlah" placeholder="ex: 300" value="{{ $products->jumlah_product }}">
                    @error('jumlah_product')
                    <div class="alert alert-danger mt-2">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>
            <div class="form-group mb-3 row">
                <label for="status" class="font-weight-bold col-sm-2 col-form-label">Status Publish</label>
                <div class="col-sm-10">
                    <select required name="status_publish" id="status" class="form-control @error('status_publish') is-invalid @enderror">
                        <option value=""></option>
                        <option value="Draft {{ $products->status_publish == 'Draft' ? 'selected' : '' }}">Draft</option>
                        <option value="Publish {{ $products->status_publish == 'Publish' ? 'selected' : '' }}">Publish</option>
                    </select>
                    @error('status_publish')
                    <div class="alert alert-danger mt-2">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>

            <div class="row mb-3 mt-5">
                <div class="col">
                    <input type="hidden" name="variant_product" value="{{$products->variant_product}}">
                    <input type="hidden" name="status_publish" value="Draft">
                    <br>
                    <button type="submit" class="btn btn-danger "><i class="bi bi-trash3"></i> Hapus</button>
                    <a href="{{ route('Admin.admin') }}" type="button" class="btn btn-secondary"><i class="bi bi-arrow-left-square"></i> Batal</a>
                </div>
            </div>

        </form>
    </div>


</div>



@endsection
