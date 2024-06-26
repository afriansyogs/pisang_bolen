<x-navbar />

<header>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
    />
    <link rel="stylesheet" href="{{ asset('/assets/css/navbar.css') }}" />
</header>

<style>
    input[type="number"]::-webkit-inner-spin-button,
    input[type="number"]::-webkit-outer-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    body {
        background-color: #DDE6ED;
    }

    .container_cart {
        margin-top: 100px; /* Adjusted value to push content further below the navbar */
    }

    .cart-item {
        padding: 15px;
        border: 1px solid #e3e3e3;
        border-radius: 10px;
        background-color: white;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        margin-bottom: 20px;
    }

    .cart-item img {
        max-width: 100px;
        margin-right: 15px;
    }

    .cart-item .form-group {
        display: flex;
        align-items: center;
    }

    .cart-item .formQty {
        width: 60px;
        text-align: center;
    }

    .cart-item button {
        border: none;
        background: none;
        font-size: 20px;
        margin: 0 10px;
    }

    .cart-item .btn-danger {
        font-size: 14px;
    }

    .total {
        font-size: 18px;
        font-weight: bold;
    }

    .order-total {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 15px;
        border: 1px solid #e3e3e3;
        border-radius: 10px;
        background-color: white;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        margin-top: 20px;
    }

    .order-total h1 {
        margin: 0;
        font-size: 24px;
    }

    .order-total button {
        padding: 10px 20px;
        font-size: 18px;
        font-weight: bold;
    }
    
    /* Media query for mobile devices */
    @media (max-width: 767px) {
        .cart-item {
            flex-direction: column;
            text-align: center;
        }

        .cart-item img {
            margin: 0 auto 15px;
        }

        .cart-item .col-md-2,
        .cart-item .col-md-6,
        .cart-item .col-md-2,
        .cart-item .col-md-2 {
            width: 100%;
            text-align: center;
            margin-bottom: 10px;
        }

        .order-total {
            flex-direction: column;
        }

        .order-total h1 {
            margin-bottom: 15px;
            text-align: center;
        }
        
        .order-total button {
            width: 100%;
            text-align: center;
        }
    }

    @media (min-width: 768px) and (max-width: 991px) {
        .cart-item .col-md-2,
        .cart-item .col-md-6,
        .cart-item .col-md-2,
        .cart-item .col-md-2 {
            width: 50%;
            text-align: center;
            margin-bottom: 10px;
        }

        .order-total {
            flex-direction: column;
        }

        .order-total h1 {
            margin-bottom: 15px;
            text-align: center;
        }
        
        .order-total button {
            width: 100%;
            text-align: center;
        }
    }
</style>

<div class="container_cart container">
    @php 
        $total = 0;
    @endphp
    <h1>{{$cart->count()}} Barang Belum Di Checkout</h1>
    @foreach($cart as $cartItem)
    <div class="cart-item row">
        <div class="col-md-2">
            @if($cartItem->product)
                <img src="{{ asset('storage/images/' . $cartItem->product->foto_product) }}" alt="{{ $cartItem->product->variant_product }}" />
            @else
                <p>Gambar produk tidak tersedia</p>
            @endif
        </div>
        <div class="col-md-6">
            <h1 class="mb-1">{{ $cartItem->product->variant_product }}</h1>
            <h4 class="mb-1">Harga Satuan: Rp {{ number_format($cartItem->product->harga_product, 0, ',', '.') }}.000</h4>
            <h4 class="mb-1">Subtotal: Rp {{ number_format($cartItem->harga_product) }}.000</h4>
        </div>
        <div class="col-md-2">
            <form action="{{ route('cart.update', $cartItem->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group qtyForm">
                    <button type="button" class="col-sm-2 rounded-start bg-warning p-2 border border-0" onclick="qtyMinus('{{ $cartItem->id }}')">-</button>
                    <input type="number" name="qty" id="qty{{ $cartItem->id }}"
                        class="form-control formQty bg-transparent border-0" value="{{ $cartItem->qty }}" min="1" required
                        onchange="this.form.submit()">
                    <button type="button" class="col-sm-2 rounded-end bg-warning p-2 border border-0" onclick="qtyPlus('{{ $cartItem->id }}')">+</button>
                </div>
            </form>
        </div>
        <div class="col-md-2 text-end">
            <form action="{{ route('cart.destroy', $cartItem->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-outline-danger">Hapus</button>
            </form>
        </div>
    </div>
    @php
        $total += ($cartItem->product->harga_product * $cartItem->qty);
    @endphp
    @endforeach

    <div class="order-total">
        <h1>Total Harga: Rp {{ number_format($total, 0, ',', '.') }}.000</h1>
        <form action="{{ route('order.create') }}" method="GET">
            <button type="submit" class="btn btn-outline-warning">Checkout</button>
        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script>
    function qtyMinus(itemId) {
        let inputQty = document.getElementById("qty" + itemId);
        inputQty.stepDown();
        inputQty.dispatchEvent(new Event("change"));
    }

    function qtyPlus(itemId) {
        let inputQty = document.getElementById("qty" + itemId);
        inputQty.stepUp();
        inputQty.dispatchEvent(new Event("change"));
    }
</script>
