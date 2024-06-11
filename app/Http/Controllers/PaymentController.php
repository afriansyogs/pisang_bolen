<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;


class PaymentController extends Controller
{
    public function index(): View
    {
        $payment = Payment::get();
        return view('admin.payment.paymentList', compact('payment'));
    }

    public function create(): View
    {
        return view('admin.payment.addPayment');
    }

    public function store(Request $request): RedirectResponse
    {
        $this->validate($request, [
            'name_payment' => 'required',
            'img'  => 'required|image|mimes:jpeg,jpg,png|max:2048',
        ]);

        $img = $request->file('img');
        $img->storeAs('public/payment', $img->hashName());

        Payment::create([
            'name_payment' => $request->name_payment,
            'img' => $img->hashName(),
        ]);

        return redirect()->route('payment.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function edit($id): View
    {
        $payment = Payment::findOrFail($id);

        return view('admin.payment.paymentEdit', compact('payment'));
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $this->validate($request, [
            'name_payment' => 'required',
            'img'  => 'image|mimes:jpeg,jpg,png|max:2048',
        ]);

        $payment = Payment::findOrFail($id);

        if ($request->hasFile('img')) {

            $img = $request->file('img');
            $img->storeAs('public/payment', $img->hashName());

            Storage::delete('public/payment/' . $payment->img);

            $payment->update([
                'name_payment' => $request->name_payment,
                'img' => $img->hashName(),
            ]);
        } else {

            $payment->update([
                'name_payment' => $request->name_payment,
            ]);
        }

        return redirect()->route('payment.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    public function destroy($id): RedirectResponse {
        $payment = Payment::withTrashed()->findOrFail($id);
        $payment->forceDelete();
        return redirect()->route('payment.onlytrash')->with('success', 'Data berhasil dihapus secara permanen.');
    }

    public function softDelete($id) {
        $payment = Payment::findOrFail($id);
        $payment->delete();

        return redirect()->route('payment.index')->with('success', 'Data berhasil dihapus secara lembut.');
    }

    public function onlyTrashPayment():view {
        $paymentTrash = Payment::onlyTrashed()->latest()->get();

        return view('admin.payment.history', compact('paymentTrash'));
    }

    public function restore($id) {
        $payment = Payment::withTrashed()->findOrFail($id);
        $payment->restore();

        return redirect()->route('payment.onlytrash')->with('success', 'Data berhasil dipulihkan.');
    }
}
