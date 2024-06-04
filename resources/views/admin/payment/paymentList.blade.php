@extends('admin/dashboard_admin')

@section('content')
<!-- alert  -->
@if (session('success'))
<div id="closeAlert" class="alert alert-success alert-dismissible fade show text position-absolute end-0 z-2 me-5"
    role="alert">
    <strong>Data Berhasil Dihapus!</strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<div class="text-black mt-5">
    <h1 class="text-center text-black mt-3">Data Payment</h1>
    <div class="d-flex justify-content-end me-3">
        <a href="{{ route('payment.create') }}" class="btn  btn-dark btn-sm ms-auto rounded-2">
            <div class=" mx-2">
                <span class="fw-bolder fs-5">Tambah</span>
                <i class="fa-solid fa-clock-rotate-left fa-lg ms-1 "></i>
            </div>
        </a>
    </div>

    <div class="col-12">
        <table id="example" class="table table-striped" style="width:100%" border="1px solid black">
            <thead>
                <tr>
                    <th data-priority="1" class="text-center">No</th>
                    <th data-priority="1" class="text-center">Method Payment</th>
                    <th data-priority="1" class="text-center">Gambar</th>
                    <th data-priority="1" class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($payment as $no => $paymentList )
                <tr>
                    <td class="text-center">{{ ++$no }}</td>
                    <td class="text-center">{{ $paymentList->name_payment }}</td>
                    <td class="text-center">
                        <img src="{{ asset('/storage/payment/'.$paymentList->img) }}" class="card-img-top"
                            alt="Bolen Jonegoroan" style="width: 160px">
                    </td>
                    <td class="text-center">
                        <a href="{{ route('payment.edit', $paymentList->id) }}" class="btn btn-sm btn-primary">EDIT</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
