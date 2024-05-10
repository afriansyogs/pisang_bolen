@extends('admin/dasbhoard_admin')

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
    <!-- Konten lain di sebelah kiri -->
    <a href="{{ route('dashboard_admin.onlytrash') }}" class="btn btn-warning ms-auto">
    <div class=" mx-2">
        <span class="fw-bolder fs-5">History</span>
    <i class="fa-solid fa-clock-rotate-left fa-lg ms-1 "></i>
    </div>
</a>
</div>
    

    @foreach ($saran as $saranList)
    <div class="w-full h-auto mx-3 my-4 bg-warning border border-dark rounded-3 ">
        <div class="my-2 mx-2 d-flex justify-content-between align-items-center">
            <h1 class="mb-0">{{ $saranList->name_user }}</h1>  
            <form onsubmit="return confirm('Apakah Anda Yakin Menghapus secara permanen ?');" action="{{ route('dashboard_admin.softdelete', $saranList->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm">
                        <i class="fa-solid fa-trash fa-lg"></i>
                        </button>
                    </form>
            
        </div>
        <p class="mb-0 fs-5 text-secondary mx-2">{{ $saranList->created_at }}</p>
        <p class="fs-4 mx-2">{{ $saranList->saran }}</p>
    </div>
    @endforeach
    
    <!-- views/dashboard.blade.php -->






</div>

@endsection