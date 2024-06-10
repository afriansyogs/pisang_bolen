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
        padding: 40px; /* Increased padding */
        background-color: white;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        max-width: 1000px; /* Set a maximum width for larger form */
        width: 90%; /* Set width to 90% for better responsiveness */
        margin-left: auto;
        margin-right: auto;
    }

    h2, h3 {
        margin-bottom: 20px;
        font-size: 24px; /* Increased font size */
    }

    form div {
        margin-bottom: 20px; /* Increased spacing between form elements */
    }

    label {
        display: block;
        margin-bottom: 10px; /* Increased space below label */
        font-weight: bold;
        font-size: 16px; /* Increased font size */
    }

    input[type="text"], select, input[type="file"] {
        width: 100%;
        padding: 15px; /* Increased padding */
        font-size: 16px; /* Increased font size */
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
        padding: 20px; /* Increased padding */
        border: 1px solid #e3e3e3;
        border-radius: 5px;
        background-color: #fdfdfd;
    }

    .product-details p {
        margin: 0;
        font-size: 16px; /* Increased font size */
    }

    button[type="submit"] {
        display: block;
        width: 100%;
        padding: 15px; /* Increased padding */
        font-size: 18px; /* Increased font size */
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
            padding: 20px;
            width: 100%; /* Ensures full width on mobile */
        }

        .product-details {
            padding: 15px;
        }

        button[type="submit"] {
            padding: 15px;
        }

        h2, h3 {
            font-size: 20px;
        }

        label {
            font-size: 14px;
        }

        input[type="text"], select, input[type="file"] {
            padding: 10px;
        }

        .product-details p {
            font-size: 14px;
        }
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

        <!-- Dropdown Provinsi -->
        <div>
            <label for="provinsi">Provinsi:</label>
            <select id="provinsi" name="provinsi" required>
                <option value="">Pilih Provinsi</option>
            </select>
        </div>

        <!-- Dropdown Kota -->
        <div>
            <label for="kota">Kota:</label>
            <select id="kota" name="kota" disabled required>
                <option value="">Pilih Kota</option>
            </select>
        </div>

        <div>
            <label for="id_payment">Metode Pembayaran:</label>
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
            <label for="bukti_transaksi">Bukti Transaksi:</label>
            <input type="file" name="bukti_transaksi" id="bukti_transaksi" required>
        </div>

        <h3>Detail Produk</h3>
        @foreach($cart as $cartItem)
        <div class="product-details">
            <p><strong>Nama Produk:</strong> {{ $cartItem->product->variant_product }}</p>
            <p><strong>Harga 1 Produk:</strong> Rp {{ number_format($cartItem->product->harga_product, 0, ',', '.') }}.000</p>
            <p><strong>Total Harga Produk:</strong> Rp {{ number_format($cartItem->product->harga_product * $cartItem->qty, 0, ',', '.') }}.000</p>
            <p><strong>Jumlah:</strong> {{ $cartItem->qty }}</p>
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
            $('#provinsi').append(data.map(provinsi => <option value="${provinsi.provinsi}">${provinsi.provinsi}</option>));
        });

        // Mengambil dan menampilkan kota berdasarkan provinsi yang dipilih
        $('#provinsi').change(function() {
            let provinsi = $(this).val();
            $('#kota').prop('disabled', !provinsi);
            if(provinsi) {
                $.post("{{ route('getCities') }}", { provinsi: provinsi, _token: '{{ csrf_token() }}' }, function(data) {
                    $('#kota').empty().append('<option value="">Pilih Kota</option>');
                    $('#kota').append(data.map(kota => <option value="${kota.kota}" data-ongkir="${kota.ongkir}">${kota.kota}</option>));
                });
            } else {
                $('#kota').empty().append('<option value="">Pilih Kota</option>');
            }
        });

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
