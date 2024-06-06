<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <script src="https://kit.fontawesome.com/f9189b0d8d.js" crossorigin="anonymous"></script>

</head>
<body style="background: lightgray">

    <div class="container mt-5 mb-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-light">
                    <a href="{{ route('order.admin') }}" class="btn btn-primary ms-3 border-2 border-white">
    <i class="fa-solid fa-arrow-left"></i>
</a>
                        <h1 class="text-center mt-4">Detail Order</h1>
                    </div>
                    <div class="card-body">
                        <p class="fs-5">Nama User : {{ $orders->user->name }}</p>
                        <p class="fs-5">Variant Product : {{ $orders->product->variant_product }}</p>
                        <p class="fs-5">Jumlah Pesanan : {{ $orders->qty }}</p>
                        <p class="fs-5">Harga Product : {{ $orders->harga_product }}</p>
                        <p class="fs-5">Alamat : {{ $orders->alamat }}</p>
                        <div class="text-center">
                            <h3 class="fs-bold">Bukti Transaksi</h3>
                            <img src="{{ asset('storage/' . $orders->bukti_transaksi) }}" alt="Bukti Transaksi" class="img-fluid" style="max-width: 100%; height: auto;">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html>
