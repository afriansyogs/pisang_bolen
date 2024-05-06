@extends('admin/testimoni/LayoutTesti')

@section('content')

<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            @if (session('successTesti'))
            <div id="closeAlert" class="alert alert-success alert-dismissible fade show text position-absolute end-0 z-2 me-5" role="alert">
                <strong>Testimoni terkirim!</strong> Terimakasi sudah memberi testimoni
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif

            <div>
                <h3 class="text-center my-4">Admin Testimoni</h3>
                
                <hr>
            </div>
            <div class="card border-0 shadow-sm rounded">
                <div class="card-body">
                    <a href="{{ route('" class="btn btn-md btn-success mb-3">TAMBAH POST</a>

                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">JUDUL</th>
                                <th scope="col">CONTENT</th>
                                <th scope="col">HAPUS</th>
                            </tr>
                        </thead>
                        <tbody>
                        
                            @foreach ($testi as $testiList)
                            <tr>
                                
                                <td>{{ $testiList->testi }}</td>
                                <td>{{ $testiList->testi }}</td>
                                <td>
                                    <a href="" value="hapus" class="btn btn-outline-danger mt-2"><i class="bi bi-trash3"></i></a>
                                </td>
                                
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection