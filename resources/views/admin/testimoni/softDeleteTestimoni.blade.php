@extends('admin/dasbhoard_admin')

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
                    <a href="{{ route('adminTesti.create') }}" class="btn btn-md btn-success mb-3">TAMBAH POST</a>

                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">JUDUL</th>
                                <th scope="col">CONTENT</th>
                                <th scope="col">RESTORE</th>
                                <th scope="col">HAPUS</th>
                            </tr>
                        </thead>
                        <tbody>
                        
                            @foreach ($testiTrash as $testiList)
                            <tr>
                                
                                <td>{{ $testiList->testi }}</td>
                                <td>{{ $testiList->testi }}</td>
                                
                                <td>
                                <form action="{{ route('userSoftDelete.restore', $testiList->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="btn btn-success">Restore</button>
                                </form>
                                </td>
                                <td>
                                <form onsubmit="return confirm('Apakah Anda Yakin Menghapus secara permanen ?');" action="{{ route('adminTesti.destroy', $testiList->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                </form>
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