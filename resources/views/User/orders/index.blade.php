<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Order</title>
    <style>
        .container {
            width: 80%;
            margin: 0 auto;
        }

        .order-item {
            margin-bottom: 20px;
            border: 1px solid #ccc;
            padding: 10px;
            display: flex;
            align-items: center; /* Pusatkan konten secara vertikal */
        }

        .order-item .content {
            display: flex;
            flex: 1;
        }

        .order-item .image-container {
            margin-right: 20px;
        }

        .order-item img {
            max-width: 100%;
            height: auto; 
        }
        hr {
            margin: 20px 0;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Daftar Order</h1>
        @foreach($orders as $order)
        <div class="order-item">
            <div class="content">
                <div class="image-container">
                    <img src="{{ asset('storage/images/' . $order->product->foto_product) }}"
                        alt="{{ $order->product->variant_product }}" />
                </div>
                <div class="text-container">
                    <h2>{{ $order->product->variant_product }}</h2>
                    <p>Deskripsi: {{ $order->product->description_product }}</p>
                    <p>Harga: {{ $order->product->harga_product }}</p>
                    <p>Jumlah Pesanan: {{ $order->qty }}</p>
                    <p>Total Harga: {{ $order->qty * $order->product->harga_product }}</p>
                    <p>Alamat Pengiriman: {{ $order->alamat }}</p>
                    <p>Nama User: {{ $user->name }}</p>
                    <p>No HP: {{ $user->number }}</p>
                    <p>Bukti Transaksi:</p>
                    <img src="{{ asset('storage/' . $order->bukti_transaksi) }}" alt="Bukti Transaksi"
                        class="img-fluid" style="max-width: 100%; height: auto;">
                </div>
            </div>
        </div>
        <hr>
        @endforeach
    </div>
</body>

</html>
