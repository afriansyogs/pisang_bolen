<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .content_afterOrder {
            margin-top: 80px; /* Adjust this value to move the content upwards */
            min-height: calc(100vh - 80px); /* Adjust based on the new margin-top value */
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        .afterOrder {
            background-color: gainsboro;
            padding: 20px;
            width: 100%;
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

        .no-orders {
            text-align: center;
            font-size: 1.5rem;
            color: #555;
        }

         @media (max-width: 576px) {
            .content_afterOrder {
                margin-top: 80px; /* Increase the top margin for smaller screens */
                
            }
        }
    </style>
</head>

<body>
    <x-navbar />
    <section class="afterOrder">
        <div class="container content_afterOrder">
            <h1 class="text-center fw-bold">DAFTAR ORDERAN</h1>
            @if($orders->isEmpty())
                <div class="no-orders">
                    <p>Belum ada pesanan.</p>
                </div>
            @else
                @foreach($orders as $order)
                <div class="order-item row">
                    <div class="col-lg-3 col-md-4 col-sm-12 mb-3">
                        <img src="{{ asset('storage/images/' . $order->product->foto_product) }}" alt="{{ $order->product->variant_product }}" class="img-fluid" />
                    </div>
                    <div class="col-lg-4 col-md-8 col-sm-12 mb-3">
                        <h2>{{ $order->product->variant_product }}</h2>
                        <p>Deskripsi: {{ $order->product->description_product }}</p>
                        <p>Harga: {{ $order->product->harga_product }}</p>
                        <p>Jumlah Pesanan: {{ $order->qty }}</p>
                        <p>Total Harga: {{ $order->qty * $order->product->harga_product }}</p>
                        <p>Alamat Pengiriman: {{ $order->alamat }}</p>
                        <p>Nama: {{ $user->name }}</p>
                        <p>No HP: {{ $user->number }}</p>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-12 mb-3">
                        <h3 class="fw-bold text-center">Bukti Transaksi:</h3>
                        <img src="{{ asset('storage/' . $order->bukti_transaksi) }}" alt="Bukti Transaksi" class="img-fluid" style="width: 100%" height="auto">
                    </div>
                    <div class="col-lg-2 col-md-8 col-sm-12 d-flex align-items-center justify-content-center mb-3">
                        @if($order->status == 'konfirmasi pesanan')
                        <div class="d-flex align-items-center">
                            <i class="fa-solid fa-clock"></i>
                            <div class="ms-3 fw-bold">Menunggu Konfirmasi</div>
                        </div>
                        @endif
                        @if($order->status == 'diproses')
                        <div class="d-flex align-items-center">
                            <i class="fa-solid fa-arrows-rotate mt-1"></i>
                            <div class="ms-3 fw-bold">Pesanan Diproses</div>
                        </div>
                        @endif
                        @if($order->status == 'pesanan sedang diantar')
                        <div class="d-flex align-items-center">
                            <i class="fa-solid fa-truck-fast mt-1"></i>
                            <div class="ms-3 fw-bold">Pesanan Diantar</div>
                        </div>
                        @endif
                        @if($order->status == 'pesanan diterima menunggu konfirmasi user')
                            <form action="{{ route('orders.update-status', $order->id) }}" method="POST" class="d-inline">
                                @csrf
                                <input type="hidden" name="status" value="pesanan selesai">
                                <button type="submit" class="btn btn-light border-primary border-3 fw-bold">Konfirmasi Pesanan Diterima</button>
                            </form>
                        @endif
                        @if($order->status == 'pesanan selesai')
                            <a href="{{ route('adminTesti.create') }}" class="btn btn-secondary text-center py-2">Beri Testimoni</a>
                        @endif
                    </div>
                </div>
                <hr>
                @endforeach
            @endif
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>
