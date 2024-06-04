<x-navbar />

<header>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="{{ asset('/assets/css/navbar.css') }}">
</header>

<style>
    body {
        background-color: white;
    }

    .container_order {
        margin-top: 5%;
    }
</style>

<div class="container_order container">
    <h2>Buat Order</h2>

    <form action="{{ route('order.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div>
            <label for="alamat">Alamat:</label>
            <input type="text" name="alamat" id="alamat" value="{{ $user->alamat }}" required>
        </div>

        <div>
            <label for="id_payment">Metode Pembayaran:</label>
            <select name="id_payment" id="id_payment" required>
                @foreach($payments as $payment)
                    <option value="{{ $payment->id }}">{{ $payment->name_payment }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="bukti_transaksi">Bukti Transaksi:</label>
            <input type="file" name="bukti_transaksi" id="bukti_transaksi" required>
        </div>

        <!-- Ubah disini -->
        <h3>Detail Produk</h3>
        @foreach($cart as $cartItem)
            <div>
                <p>Nama Produk: {{ $cartItem->product->variant_product }}</p>
                <p>Harga Produk: Rp {{ number_format($cartItem->product->harga_product, 0, ',', '.') }}</p>
                <p>Jumlah: {{ $cartItem->qty }}</p>
            </div>
        @endforeach
        <!-- Ubah disini -->

        <button type="submit">Order</button>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
