<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;

class CartController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        if ($user) {
            $cart = Cart::where('id_user', $user->id)->get();
            return view('user.carts.index', compact('cart'));
        }
        return redirect()->route('login');
    }
    public function store(Request $request)
    {
        $userId = auth()->user()->id;
        $productId = $request->input('id_product');

        $existingCart = Cart::where('id_user', $userId)->where('id_product', $productId)->first();

        if ($existingCart) {
            return redirect()->back()->with('error', 'Produk sudah ada di keranjang Anda.');
        }

        $product = Product::findOrFail($productId);

        $cart = new Cart([
            'id_user' => auth()->user()->id,
            'id_product' => $request->input('id_product'),
            'qty' => $request->input('qty', 1),
            'harga_product' => $product->harga_product * $request->input('qty', 1),
        ]);
        $cart->save();
        return redirect()->route('cart.index')->with('success', 'Product added to cart successfully.');
    }
    public function destroy($id)
    {
        Cart::destroy($id);
        return redirect()->back()->with('success', 'Product removed from cart.');
    }
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'qty' => 'required|integer|min:1',
        ]);

        $cartItem = Cart::findOrFail($id);
        $cartItem->qty = $data['qty'];
        $cartItem->harga_product = $cartItem->product->harga_product * $data['qty']; 
        $cartItem->save();

        return redirect()->route('cart.index')->with('success', 'Quantity updated successfully');
    }
}