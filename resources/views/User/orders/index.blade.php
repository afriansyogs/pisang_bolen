<!-- resources/views/user/orders/index.blade.php -->

<div class="container">
    <h1>Daftar Order</h1>
    @foreach($orders as $order)
        <div class="order-item">
            <h2>{{ $order->product->variant_product }}</h2>
            <img src="{{ asset('storage/product/' . $order->product->foto_product) }}" alt="{{ $order->product->variant_product }}" width="150">
            <p>Deskripsi: {{ $order->product->description_product }}</p>
            <p>Deskripsi: {{ $order->product->harga_product }}</p>
            <p>jumlah pesanan: {{ $order->qty }}</p>
            <p>Total harga: {{ $order->harga_product }}</p>
            <p>Alamat Pengiriman: {{ $order->alamat }}</p>
            <p>Nama User: {{ $user->name }}</p>
            <p>No HP: {{ $user->number }}</p>
            <p>Bukti Transaksi:</p>
            <img src="{{ asset('storage/' . $order->bukti_transaksi) }}" alt="Bukti Transaksi" width="150">
        </div>
        <hr>
    @endforeach
</div>

