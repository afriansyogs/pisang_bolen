<x-navbar />

<header>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="{{ asset('/assets/css/navbar.css') }}">
</header>

<style>
    input[type="number"]::-webkit-inner-spin-button,
    input[type="number"]::-webkit-outer-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    body {
        background-color: white;
    }

    .container_cart {
        margin-top: 5%;
    }

    .cart-item {
        padding: 15px;
        border: 1px solid #e3e3e3;
        border-radius: 10px;
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
</style>

<div class="container_cart container">
    @foreach($cart as $cartItem)
    <div class="cart-item row">
        <div class="col-md-2">
            <img src="{{ $cartItem->product->image_url }}" alt="{{ $cartItem->product->variant_product }}">
        </div>
        <div class="col-md-6">
            <p class="mb-1">{{ $cartItem->product->variant_product }}</p>
            <p class="mb-1">Harga: Rp {{ number_format($cartItem->product->harga_product, 0, ',', '.') }}</p>
            <p class="mb-1">Subtotal: Rp {{ number_format($cartItem->product->harga_product * $cartItem->qty, 0, ',', '.') }}</p>
        </div>
        <div class="col-md-2">
            <form action="{{ route('cart.update', $cartItem->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group qtyForm">
                    <button type="button" class="col-sm-2 rounded-start bg-warning p-2 border border-0" onclick="qtyPlus('{{ $cartItem->id }}')">+</button>
                    <input type="number" name="qty" id="qty{{ $cartItem->id }}"
                        class="form-control formQty bg-transparent border-0" value="{{ $cartItem->qty }}" min="1" required
                        onchange="this.form.submit()">
                    <button type="button" class="col-sm-2 rounded-end bg-warning p-2 border border-0" onclick="qtyMinus('{{ $cartItem->id }}')">-</button>
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
    @endforeach
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script>
    function qtyMinus(itemId) {
        let inputQty = document.getElementById('qty' + itemId);
        inputQty.stepDown();
        inputQty.dispatchEvent(new Event('change'));
    }

    function qtyPlus(itemId) {
        let inputQty = document.getElementById('qty' + itemId);
        inputQty.stepUp();
        inputQty.dispatchEvent(new Event('change'));
    }
</script>
