@extends('admin/dashboard_admin')

@section('content')
<!-- alert  -->
@if (session('success'))
<div id="closeAlert" class="alert alert-success alert-dismissible fade show text position-absolute end-0 z-2 me-5" role="alert">
    <strong>Data Berhasil Dihapus!</strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<a href="{{ route('userAdmin.index') }}" class="btn btn-warning ms-3 border-2 border-black">
    <i class="fa-solid fa-arrow-left"></i>
</a>

<div class="text-black mt-5">
    <h1 class="text-center text-black mt-3">Data User</h1>
    <div class="d-flex justify-content-end me-3">
        
    </div>

    <div class="col-12">
        <table id="example" class="table table-striped" style="width:100%" border="1px solid black">
            <thead>
                <tr>
                    <th data-priority="1" class="text-center">No</th>
                    <th data-priority="1" class="text-center">Nama User</th>
                    <th data-priority="1" class="text-center">email</th>
                    <th data-priority="1" class="text-center">No Telp</th>
                    <th data-priority="1" class="text-center">Alamat</th>
                    <th data-priority="1" class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $no => $userList )
                <tr>
                    <td class="text-center">{{ ++$no }}</td>
                    <td class="text-center">{{ $userList->name }}</td>
                    <td class="text-center">{{ $userList->email }}</td>
                    <td class="text-center">{{ $userList->number }}</td>
                    <td class="text-center">{{ $userList->alamat }}</td>
                    <td class="text-center">
                    <form action="{{ route('user.restore', $userList->id) }}" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-success">
                            <i class="bi bi-box-arrow-left mx-1"></i>Restore
                        </button>
                    </form>
                        <form onsubmit="return confirm('Apakah Anda Yakin Menghapus secara permanen ?');" action="{{ route('user.destroy', $userList->id) }}" method="POST" class="d-inline">
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

@endsection
