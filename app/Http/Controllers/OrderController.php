<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Payment;
use App\Models\User;


class OrderController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $orders = Order::where('id_user', $user->id)->with('product')->get();
        return view('user.orders.index', compact('orders', 'user'));
    }

    public function create()
    {
        $user = auth()->user();
        $payments = Payment::all();
        $cart = Cart::where('id_user', $user->id)->get();
        return view('user.orders.create', compact('user', 'payments', 'cart'));
    }

    public function store(Request $request)
    {
        $user = Auth::user();
        $cartItems = Cart::where('id_user', $user->id)->get();

        foreach ($cartItems as $cartItem) {
            Order::create([
                'id_user' => $user->id,
                'id_product' => $cartItem->id_product,
                'harga_product' => $cartItem->product->harga_product, // Ubah disini
                'qty' => $cartItem->qty,
                'alamat' => $request->input('alamat'),
                'id_payment' => $request->input('id_payment'),
                'bukti_transaksi' => $request->file('bukti_transaksi')->store('bukti_transaksi', 'public'),
            ]);
        }

        // Kosongkan keranjang setelah order
        Cart::where('id_user', $user->id)->delete();

        return redirect()->route('order.index')->with('success', 'Order berhasil dibuat.');
    }
}
