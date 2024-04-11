@extends('Produk/layout')

@section('content')

<div class="container">

    
    <form method="POST" action="" enctype="multipart/form-data">

        <div class="mb-3 row mt-5">
            <label for="variant" class="col-sm-2 col-form-label">Variant</label>
            <div class="col-sm-10">
                <input required type="text" name="variant_product" class="form-control" id="variant" placeholder="ex: Coklat" value="">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="deskripsi" class="col-sm-2 col-form-label">Deskripsi</label>
            <div class="col-sm-10">
                <input required type="text" name="deskripsi_product" class="form-control" id="deskripsi" placeholder="ex: " value="">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="harga" class="col-sm-2 col-form-label">Harga Produk</label>
            <div class="col-sm-10">
                <input required type="text" name="harga_produk" class="form-control" id="harga" placeholder="ex: Rp. 100.000" value="">
            </div>
        </div>

        <div class="mb-3 row mt-5">
            <div class="col">
                    <button type="submit" name="aksi" value="edit" class="btn btn-success">Simpan</button>
                    <button type="submit" name="aksi" value="add" class="btn btn-primary">Tambah</button>
                    <a href="" type="button" class="btn btn-danger">Batal</a>
            </div>
        </div>

  </form>


</div>



@endsection
