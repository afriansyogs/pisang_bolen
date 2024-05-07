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

    @foreach ($saranTrash as $saranHistory)
    <div class="w-full h-auto mx-3 my-4 bg-warning border border-dark rounded-3 ">
        <div class="my-2 mx-2 d-flex justify-content-between align-items-center">
            <!-- <h1 class="mb-0">{{ $saranHistory->nama_user }}</h1> -->
            <h1 class="mb-0">user</h1>
            <form onsubmit="return confirm('Apakah Anda Yakin Menghapus secara permanen ?');" action="{{ route('dasbhoard_admin.destroy', $saranHistory->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
            </form>
        </div>
        <p class="mb-0 fs-5 text-secondary mx-2">{{ $saranHistory->created_at }}</p>
        <p class="fs-4 mx-2">{{ $saranHistory->saran }}</p>
        <form action="{{ route('dashboard_admin.restore', $saranHistory->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <button type="submit" class="btn btn-success">Restore</button>
                    </form>
    </div>

    @endforeach
</div>
@endsection