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
    <h1 class="text-center text-black mt-3">Data Testimoni</h1>
    <div class="d-flex justify-content-end me-3">
    <!-- <a href="{{ route('adminTesti.create') }}" class="btn btn-md btn-success mb-3">TAMBA</a> -->
        <a href="{{ route('history.onlyTrashTestimoni') }}" class="btn  btn-dark btn-sm ms-auto rounded-2">
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
                    <th data-priority="1" class="text-center">Testimoni</th>
                    <th data-priority="1" class="text-center">Tanggal</th>
                    <th data-priority="1" class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($testi as $no => $testiList )
                <tr>
                    <td class="text-center">{{ ++$no }}</td>
                    <td class="text-center">{{ $testiList->name }}</td>
                    <td class="text-center">{{ $testiList->testi }}</td>
                    <td class="text-center">{{ $testiList->created_at }}</td>
                    <td class="text-center">
                        <form onsubmit="return confirm('Apakah Anda Yakin Ingin Memindahkan Ke Folder Sampah ?');" action="{{ route('userSoftDelete.softdelete', $testiList->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger">
                                <i class="fa-solid fa-trash fa-lg"></i>
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
