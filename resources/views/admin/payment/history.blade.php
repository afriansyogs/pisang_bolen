@extends('admin/dashboard_admin')

@section('content')
<a href="{{ route('payment.index') }}" class="btn btn-warning ms-3 border-2 border-black">
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
                    <th data-priority="1" class="text-center col-2">Method Payment</th>
                    <th data-priority="1" class="text-center col-2">Gambar</th>
                    <th data-priority="1" class="text-center col-4">Saran</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($paymentTrash as $no => $paymentHistory )
                <tr>
                    <td class="text-center">{{ ++$no }}</td>
                    <td class="text-center">{{ $paymentHistory->name_payment }}</td>
                    <td class="text-center">
                        <img src="{{ asset('/storage/payment/'.$paymentHistory->img) }}" class="card-img-top"
                            alt="Bolen Jonegoroan" style="width: 160px">
                    </td>
                    <td class="text-center">
                        <form action="{{ route('payment.restore', $paymentHistory->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="btn btn-success"><i class="bi bi-box-arrow-left mx-1"></i>Restore</button>
                        </form>

                        <form onsubmit="return confirm('Apakah Anda Yakin Menghapus secara permanen ?');" action="{{ route('payment.destroy', $paymentHistory->id) }}" method="POST" class="d-inline">
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
