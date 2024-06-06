<x-navbar />

<header>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="{{ asset('/assets/css/navbar.css') }}">
</header>

<style>
body {
    background-color: #f8f9fa;
}


.container_order {
    margin-top: 5%;
    padding: 20px;
    background-color: white;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

h2,
h3 {
    margin-bottom: 20px;
}

form div {
    margin-bottom: 15px;
}

label {
    display: block;
    margin-bottom: 5px;
    font-weight: bold;
}

input[type="text"],
select,
input[type="file"] {
    width: 100%;
    padding: 10px;
    border: 1px solid #ced4da;
    border-radius: 5px;
}

input[type="text"]:focus,
select:focus,
input[type="file"]:focus {
    outline: none;
    border-color: #80bdff;
    box-shadow: 0 0 5px rgba(128, 189, 255, 0.5);
}

.product-details {
    margin-bottom: 20px;
    padding: 15px;
    border: 1px solid #e3e3e3;
    border-radius: 5px;
    background-color: #fdfdfd;
}

.product-details p {
    margin: 0;
}

button[type="submit"] {
    display: block;
    width: 100%;
    padding: 10px;
    font-size: 16px;
    font-weight: bold;
    cursor: pointer;
}
    .container_order {
        margin-top: 5%;
    }

    #payment-image {
        display: none;
        margin-top: 20px;
        max-width: 100%;
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
                <option value="" selected disabled>Pilih Metode Pembayaran</option>
                @foreach($payments as $payment)
                    <option value="{{ $payment->id }}" data-image="{{ asset('storage/payment/' . $payment->img) }}">{{ $payment->name_payment }}</option>
                @endforeach
            </select>
            <img id="payment-image" src="" alt="Gambar Metode Pembayaran">
        </div>

        <div>
            <label for="bukti_transaksi">Bukti Transaksi:</label>
            <input type="file" name="bukti_transaksi" id="bukti_transaksi" required>
        </div>

        <h3>Detail Produk</h3>
        @foreach($cart as $cartItem)
        <div class="product-details">
            <p><strong>Nama Produk:</strong> {{ $cartItem->product->variant_product }}</p>
            <p><strong>Harga Produk:</strong> Rp {{ number_format($cartItem->harga_product, 0, ',', '.') }}</p>
            <p><strong>Jumlah:</strong> {{ $cartItem->qty }}</p>
        </div>
        @endforeach

        <button type="submit" class="btn btn-outline-warning">Order</button>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"

    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
</script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const paymentSelect = document.getElementById('id_payment');
        const paymentImage = document.getElementById('payment-image');

        paymentSelect.addEventListener('change', function () {
            const selectedOption = paymentSelect.options[paymentSelect.selectedIndex];
            const imageUrl = selectedOption.getAttribute('data-image');
            
            if (selectedOption.value && imageUrl) {
                paymentImage.src = imageUrl;
                paymentImage.style.display = 'block';
            } else {
                paymentImage.style.display = 'none';
            }
        });
    });
</script>
