@extends('admin/dashboard_admin')

@section('content')
<!-- alert  -->
@if (session('success'))
<div id="closeAlert" class="alert alert-success alert-dismissible fade show text position-absolute end-0 z-2 me-5" role="alert">
    <strong>Data Berhasil Dihapus!</strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<div class="text-black mt-5">
    <h1 class="text-center text-black mt-3">Data Saran</h1>
    <div class="d-flex justify-content-end me-3">
        <a href="{{ route('dashboard_admin.onlytrash') }}" class="btn  btn-dark btn-sm ms-auto rounded-2">
            <div class=" mx-2">
                <span class="fw-bolder fs-5">History</span>
                <i class="fa-solid fa-clock-rotate-left fa-lg ms-1 "></i>
            </div>
        </a>
    </div>

    <div class="col-12">
        <table id="example" class="table table-striped" style="width:100%" border="1px solid black">
            <thead>
                <tr>
                    <th data-priority="1" class="text-center">No</th>
                    <th data-priority="1" class="text-center">Nama User</th>
                    <th data-priority="1" class="text-center">Tanggal</th>
                    <th data-priority="1" class="text-center">Saran</th>
                    <th data-priority="1" class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($saran as $no => $saranList )
                <tr>
                    <td class="text-center">{{ ++$no }}</td>
                    <td class="text-center">{{ $saranList->name_user }}</td>
                    <td class="text-center">{{ $saranList->tgl }}</td>
                    <td class="text-start">{{ $saranList->saran }}</td>
                    <td class="text-center">
                        <form onsubmit="return confirm('Apakah Anda Yakin Ingin Memindahkan Ke Folder Sampah ?');" action="{{ route('dashboard_admin.softdelete', $saranList->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger">
                                <i class="bi bi-trash3"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
