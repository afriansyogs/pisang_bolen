@extends('admin/dasbhoard_admin')

@section('content')
<!-- alert  -->
<!-- @if (session('success'))
<div id="closeAlert" class="alert alert-success alert-dismissible fade show text position-absolute end-0 z-2 me-5" role="alert">
    <strong>Data Berhasil Dihapus!</strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif -->
<div class="text-black mt-5">
    <h1 class="text-center text-black mt-3">Data payment</h1>
    <div class="d-flex justify-content-end me-3">
    <a href="{{ route('payment.create') }}" class="btn btn-md btn-success mb-3">TAMBAH POST</a>
    <!-- Konten lain di sebelah kiri -->
</div>
    

    @foreach ($payment as $paymentList)
    <div class="w-full h-auto mx-3 my-4 bg-warning border border-dark rounded-3 ">
        <div class="my-2 mx-2 d-flex justify-content-between align-items-center">
            <h1 class="mb-0">{{ $paymentList->name_payment }}</h1>  
        </div>
        <img src="{{ asset('/storage/payment/'.$paymentList->img) }}" class="rounded w-50 h-50" >
        <a href="{{ route('payment.edit', $paymentList->id) }}" class="btn btn-sm btn-primary">EDIT</a>
    </div>
    @endforeach
    
    <!-- views/dashboard.blade.php -->






</div>

@endsection