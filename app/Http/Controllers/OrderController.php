<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

use App\Models\Cart;
use App\Models\Order;


class OrderController extends Controller
{
    public function createOrder(Request $request)
    {
        $userId = auth()->id(); // Dapatkan ID user yang sedang login
        $cartItems = Cart::where('id_user', $userId)->get();

        foreach ($cartItems as $item) {
            Order::create([
                'id_user' => $userId,
                'id_product' => $item->id_product,
                'qty' => $item->qty,
                // Tambahkan kolom lainnya jika diperlukan
            ]);
        }

        // Kosongkan cart setelah memindahkan data ke orders
        Cart::where('id_user', $userId)->delete();

        return redirect()->route('order.success');
    }

    public function success()
    {
        return view('order.success');
    }
}
