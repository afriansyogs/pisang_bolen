@extends('admin/dasbhoard_admin')

@section('content')
<a href="{{ route('dasbhoard_admin.index') }}" class="btn btn-warning ms-3 border-2 border-black">
    <i class="fa-solid fa-arrow-left"></i>
</a>

<div class="text-black mt-5">
    <h1 class="text-center text-black mt-3">Data Saran</h1>

    <!-- alert  -->
    @if (session('success'))
    <div id="closeAlert" class="alert alert-success alert-dismissible fade show text position-absolute end-0 z-2 me-5" role="alert">
        <strong>Data Berhasil Dihapus Permanent!</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
<div class="row">
    <div class="col-12">
        <table id="example" class="table table-striped" style="width:100%" border="1px solid black">
            <thead>
                <tr>
                    <th data-priority="1" class="text-center col-1">No</th>
                    <th data-priority="1" class="text-center col-2">Nama User</th>
                    <th data-priority="1" class="text-center col-2">Tanggal</th>
                    <th data-priority="1" class="text-center col-4">Saran</th>
                    <th class="text-center col-3">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($saranTrash as $no => $saranHistory )
                <tr>
                    <td class="text-center">{{ ++$no }}</td>
                    <td class="text-center">{{ $saranHistory->name_user }}</td>
                    <td class="text-center">{{ $saranHistory->tgl }}</td>
                    <td class="text-start">{{ $saranHistory->saran }}</td>
                    <td class="text-center">
                        <form action="{{ route('dashboard_admin.restore', $saranHistory->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="btn btn-success"><i class="bi bi-box-arrow-left mx-1"></i>Restore</button>
                        </form>

                        <form onsubmit="return confirm('Apakah Anda Yakin Menghapus secara permanen ?');" action="{{ route('dasbhoard_admin.destroy', $saranHistory->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger">
                                <i class="fa-solid fa-trash fa-lg"></i>
                                HAPUS
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    </div>
</div>

@endsection