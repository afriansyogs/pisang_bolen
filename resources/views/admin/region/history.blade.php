@extends('admin/dashboard_admin')

@section('content')
<a href="{{ route('region.index') }}" class="btn btn-warning ms-3 border-2 border-black">
    <i class="fa-solid fa-arrow-left"></i>
</a>

<div class="text-black mt-5">
    <h1 class="text-center text-black mt-3">Data Region-Ongkir</h1>

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
                    <th data-priority="1" class="text-center col-2">Provinsi</th>
                    <th data-priority="1" class="text-center col-2">Kota</th>
                    <th data-priority="1" class="text-center col-4">Ongkir</th>
                    <th class="text-center col-3">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($regionTrash as $no => $regionHistory )
                <tr>
                    <td class="text-center">{{ ++$no }}</td>
                    <td class="text-center">{{ $regionHistory->provinsi }}</td>
                    <td class="text-center">{{ $regionHistory->kota }}</td>
                    <td class="text-center">{{ $regionHistory->ongkir }}</td>
                    <td class="text-center">
                        <form action="{{ route('region.restore', $regionHistory->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="btn btn-success"><i class="bi bi-box-arrow-left mx-1"></i>Restore</button>
                        </form>

                        <form onsubmit="return confirm('Apakah Anda Yakin Menghapus secara permanen ?');" action="{{ route('region.destroy', $regionHistory->id) }}" method="POST" class="d-inline">
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
