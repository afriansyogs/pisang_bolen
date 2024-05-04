@extends('admin/dasbhoard_admin')

@section('content')
<div class="text-black mt-5">
    <h1 class="text-center text-black mt-3">Data Saran</h1>

    @foreach ($saran as $saranList)
        <div class="w-full h-auto mx-3 my-4 bg-warning border border-dark rounded-3 ">
            <div class="my-2 mx-2">
                <h1 class="mb-0">{{ $saranList->nama_user }}</h1>
                <p class="mb-0 fs-5 text-secondary">{{ $saranList->created_at }}</p>
                <p class="fs-4">{{ $saranList->saran }}</p>
            </div>
        </div>
    @endforeach
    </div>
@endsection
