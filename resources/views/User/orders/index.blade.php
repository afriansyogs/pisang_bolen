<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS CDN -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet"> <!-- Tambahan -->
    <style>
        .content_afterOrder {
            margin-top: 8%;
        }

        .afterOrder {
            background-color: gainsboro; 
            padding: 20px; 
        }

        .order-item {
            border: 1px solid #ccc;
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 8px; 
            background-color: #fff; 
        }

        .order-item img {
            max-width: 100%;
            height: auto;
            border-radius: 8px; 
        }

        .order-item h2 {
            font-size: 1.5rem;
        }

        .order-item p {
            margin: 0.5rem 0;
        }

        .order-item .btn {
            margin-top: 10px; 
        }

        hr {
            margin: 20px 0;
        }
    </style>
</head>

<body>
    <x-navbar />
    <section class="afterOrder">
        <div class="container content_afterOrder">
            <h1 class="text-center fw-bold">DAFTAR ORDERAN</h1>
            @foreach($orders as $order)
            <div class="order-item row"> 
                <div class="col-md-3 "> <!-- Perubahan: Menambahkan kelas d-flex dan align-items-center -->
                    <img src="{{ asset('storage/images/' . $order->product->foto_product) }}" alt="{{ $order->product->variant_product }}" class="img-fluid" />
                </div>
                <div class="col-md-4"> 
                    <h2>{{ $order->product->variant_product }}</h2>
                    <p>Deskripsi: {{ $order->product->description_product }}</p>
                    <p>Harga: {{ $order->product->harga_product }}</p>
                    <p>Jumlah Pesanan: {{ $order->qty }}</p>
                    <p>Total Harga: {{ $order->qty * $order->product->harga_product }}</p>
                    <p>Alamat Pengiriman: {{ $order->alamat }}</p>
                    <p>Nama: {{ $user->name }}</p>
                    <p>No HP: {{ $user->number }}</p>
                </div>
                <div class="col-md-3">
                <h3 class="fw-bold text-center">Bukti Transaksi:</h3>
                    <img src="{{ asset('storage/' . $order->bukti_transaksi) }}" alt="Bukti Transaksi" class="img-fluid" style="width: 100%" height="auto">
                </div>
                <div class="col-md-2 d-flex align-items-center justify-content-center">
                    <a href="{{ route('adminTesti.create') }}" class="btn btn-success text-center py-2">Beri Testimoni</a>
                </div>
            </div>
            <hr>
            @endforeach
        </div>
    </section>
    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
