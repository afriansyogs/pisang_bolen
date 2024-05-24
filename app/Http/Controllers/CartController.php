<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Cart;

class CartController extends Controller
{
    public function index()
    {
        $cart = Cart::where('id_user', auth()->user()->id)->get();
        return view('user.carts.index', compact('cart'));
    }
    public function store(Request $request)
    {
        $cart = new Cart([
            'id_user' => auth()->user()->id,
            'id_product' => $request->input('id_product'),
            'qty' => $request->input('qty', 1),
        ]);
        $cart->save();
        return redirect()->back()->with('success', 'Product added to cart successfully.');
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
            // Validasi lainnya sesuai kebutuhan
        ]);
        $cartItem = Cart::findOrFail($id);
        $cartItem->update($data);
        return redirect()->route('cart.index')->with('success', 'Quantity updated successfully');
    }
}