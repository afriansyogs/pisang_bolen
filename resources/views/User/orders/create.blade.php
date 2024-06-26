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
        margin-top: 100px; /* Adjusted value to push content further below the navbar */
        padding: 20px;
        background-color: white;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    h2, h3 {
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

    input[type="text"], select, input[type="file"] {
        width: 100%;
        padding: 10px;
        border: 1px solid #ced4da;
        border-radius: 5px;
    }

    input[type="text"]:focus, select:focus, input[type="file"]:focus {
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

    #payment-image {
        display: none;
        margin-top: 20px;
        max-width: 100%;
    }

    /* Media query for mobile devices */
    @media (max-width: 767px) {
        .container_order {
            margin-top: 80px;
            padding: 15px;
        }

        .product-details {
            padding: 10px;
        }

        button[type="submit"] {
            padding: 15px;
        }

        h2, h3 {
            font-size: 18px;
        }

        label {
            font-size: 14px;
        }

        input[type="text"], select, input[type="file"] {
            padding: 8px;
        }

        .product-details p {
            font-size: 14px;
        }
    }
</style>

<div class="container_order container">
    <h1 class="fw-semibold text-center">Buat Order</h1>

    <form action="{{ route('order.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div>
            <label for="alamat" class="fs-4">Alamat:</label>
            <input type="text" name="alamat" id="alamat" value="{{ $user->alamat }}" required>
        </div>

        <!-- Dropdown Provinsi -->
        <div>
            <label for="provinsi" class="fs-4">Provinsi:</label>
            <select id="provinsi" name="provinsi" required>
                <option value="">Pilih Provinsi</option>
            </select>
        </div>

        <!-- Dropdown Kota -->
        <div>
            <label for="kota" class="fs-4">Kota:</label>
            <select id="kota" name="kota" disabled required>
                <option value="">Pilih Kota</option>
            </select>
        </div>

        <div>
            <label for="id_payment" class="fs-5">Metode Pembayaran:</label>
            <select name="id_payment" id="id_payment" required>
                <option value="" selected disabled>Pilih Metode Pembayaran</option>
                @foreach($payments as $payment)
                    <option value="{{ $payment->id }}" data-image="{{ asset('storage/payment/' . $payment->img) }}">{{ $payment->name_payment }}</option>
                @endforeach
            </select>
            <div class="d-flex justify-content-center align-items-center">
                <img class="img-fluid" id="payment-image" src="" alt="Gambar Metode Pembayaran">
            </div>
        </div>

        <div>
            <label for="bukti_transaksi" class="fs-4">Bukti Transaksi:</label>
            <input type="file" name="bukti_transaksi" id="bukti_transaksi" required>
        </div>

        <h3 class="text-center fw-bold">Detail Produk</h3>
        @foreach($cart as $cartItem)
        <div class="product-details">
            <h4><strong>Nama Produk:</strong> {{ $cartItem->product->variant_product }}</h4>
            <h4><strong>Harga 1 Produk:</strong> Rp {{ number_format($cartItem->product->harga_product, 0, ',', '.') }}.000</h4>
            <h4><strong>Total Harga Produk:</strong> Rp {{ number_format($cartItem->product->harga_product * $cartItem->qty, 0, ',', '.') }}.000</h4>
            <h4><strong>Jumlah:</strong> {{ $cartItem->qty }}</h4>
        </div>
        @endforeach

        <div class="mt-3">
            <h3>Ongkir: Rp <span id="ongkir">0</span></h3>
            <h3>Total Harga: Rp <span id="total-harga">
                {{ number_format($cart->sum(function($cartItem) {
                    return $cartItem->product->harga_product * $cartItem->qty;
                }), 0, ',', '.') }}.000
            </span></h3>
        </div>

        <button type="submit" class="btn btn-outline-warning">Order</button>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="{{ asset('assets/js/order.js') }}"></script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const paymentSelect = document.getElementById('id_payment');
        const paymentImage = document.getElementById('payment-image');
        const totalHargaElement = document.getElementById('total-harga');
        const ongkirElement = document.getElementById('ongkir');

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

        // Mengambil dan menampilkan provinsi
        $.get("{{ route('getProvinces') }}", function(data) {
            $('#provinsi').append(data.map(provinsi => `<option value="${provinsi.provinsi}">${provinsi.provinsi}</option>`));
        });

        // Mengambil dan menampilkan kota berdasarkan provinsi yang dipilih
        $('#provinsi').change(function() {
            let provinsi = $(this).val();
            $('#kota').prop('disabled', !provinsi);
            if(provinsi) {
                $.post("{{ route('getCities') }}", { provinsi: provinsi, _token: '{{ csrf_token() }}' }, function(data) {
                    $('#kota').empty().append('<option value="">Pilih Kota</option>');
                    $('#kota').append(data.map(kota => `<option value="${kota.kota}" data-ongkir="${kota.ongkir}">${kota.kota}</option>`));
                });
            } else {
                $('#kota').empty().append('<option value="">Pilih Kota</option>');
            }
        });

        // Mengupdate total harga dan ongkir berdasarkan kota yang dipilih
        $('#kota').change(function() {
            const selectedOption = $(this).find('option:selected');
            const ongkir = parseInt(selectedOption.data('ongkir')) || 0;
            let totalHarga = ongkir;
            ongkirElement.textContent = new Intl.NumberFormat('id-ID').format(ongkir) + '.000';
            @foreach($cart as $cartItem)
                totalHarga += {{ $cartItem->product->harga_product }} * {{ $cartItem->qty }};
            @endforeach
            totalHargaElement.textContent = new Intl.NumberFormat('id-ID').format(totalHarga) + '.000';
        });
    });
</script>
