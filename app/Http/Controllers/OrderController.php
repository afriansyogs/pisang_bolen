<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Payment;
use App\Models\Region;
use App\Models\User;


class OrderController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $orders = Order::where('id_user', $user->id)->with('product')->latest()->get();
        return view('user.orders.index', compact('orders', 'user'));
    }

    public function showBuktiTransaksi()
    {
        $user = auth()->user();
        $buktiTransaksi = Order::where('id_user', $user->id)->select('bukti_transaksi')->get();
        return view('user.orders.index', compact('buktiTransaksi'));
    }

    public function admin(): View {
        $orders = Order::latest()->get();
        return view('admin.order.index', compact('orders'));
    }

    public function create()
    {
        $user = auth()->user();
        $payments = Payment::all();
        $cart = Cart::where('id_user', $user->id)->get();
        
        return view('user.orders.create', compact('user', 'payments', 'cart'));
    }

    public function show($id): View
    {
        $orders = Order::findOrFail($id);
        return view('admin.order.detail', compact('orders'));
    }

    public function store(Request $request)
    {
        $user = Auth::user();
        $cartItems = Cart::where('id_user', $user->id)->get();
    
        $region = Region::where('provinsi', $request->provinsi)
        ->where('kota', $request->kota)
        ->first();

        foreach ($cartItems as $cartItem) {
            $hargaProduct = $cartItem->product->harga_product * $cartItem->qty + $region->ongkir;
    
            Order::create([
                'id_user' => $user->id,
                'id_product' => $cartItem->id_product,
                'harga_product' => $hargaProduct,
                'qty' => $cartItem->qty,
                'alamat' => $request->input('alamat'),
                'id_payment' => $request->input('id_payment'),
                'bukti_transaksi' => $request->file('bukti_transaksi')->store('bukti_transaksi', 'public'),
            ]);
        }
    
        Cart::where('id_user', $user->id)->delete();
    
        return redirect()->route('order.index')->with('success', 'Order berhasil dibuat.');
    }
    
    public function destroy($id): RedirectResponse {
        $orders = Order::withTrashed()->findOrFail($id);
        $orders->forceDelete();
        return redirect()->route('order.history')->with('success', 'Data berhasil dihapus secara permanen.');
    }

    public function softDelete($id) {
        $orders = Order::findOrFail($id);
        $orders->delete();

        return redirect()->route('order.admin')->with('success', 'Data berhasil dihapus secara lembut.');
    }

    public function onlyTrashOrder():view {
        $orders = Order::onlyTrashed()->latest()->get();

        return view('admin.order.history', compact('orders'));
    }

    public function restore($id) {
        $orders = Order::withTrashed()->findOrFail($id);
        $orders->restore();

        return redirect()->route('order.history')->with('success', 'Data berhasil dipulihkan.');
    }

    public function updateStatus(Request $request, $id)
    {
        $order = Order::findOrFail($id);
        $status = $request->input('status');

        $allowedStatuses = [
            'konfirmasi pesanan',
            'diproses',
            'pesanan sedang diantar',
            'pesanan diterima menunggu konfirmasi user',
            'pesanan selesai'
        ];

        if (in_array($status, $allowedStatuses)) {
            $order->status = $status;
            $order->save();

            return redirect()->back()->with('success', 'Status order berhasil diperbarui.');
        } else {
            return redirect()->back()->with('error', 'Status order tidak valid.');
        }
    }

}