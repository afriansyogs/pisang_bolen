<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Saran;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class SaranController extends Controller {
    public function index(): View {
        $saran = Saran::latest()->get();
        return view('admin.saran.saranList', compact('saran'));
    }

    public function store(Request $request) {
        if (auth()->check()) {
            $this->validate($request, [
                'saran' => 'required|string',
            ]);

            $saran = new Saran([
                'saran' => $request->saran,
                'id_user' => auth()->user()->id,
                'name_user' => auth::user()->name,
                'tgl' => now(),
            ]);
            $saran->save();

            return redirect()->back()->with('success', 'Pesan Anda telah terkirim.');
        } else {
            return redirect()->back()->with('error', 'Anda harus login untuk mengirim pesan.');
        }
    }



    public function destroy($id): RedirectResponse {
        $saran = Saran::withTrashed()->findOrFail($id);
        $saran->forceDelete();
        return redirect()->route('dashboard_admin.onlytrash')->with('success', 'Data berhasil dihapus secara permanen.');
    }

    public function softDelete($id) {
        $saran = Saran::findOrFail($id);
        $saran->delete();

        return redirect()->route('dashboard_admin.index')->with('success', 'Data berhasil dihapus secara lembut.');
    }

    public function onlyTrashSaran() :view {
        $saranTrash = Saran::onlyTrashed()->latest()->get();

        return view('admin.saran.softDeleteSaran', compact('saranTrash'));
    }

    public function restore($id) {
        $saran = Saran::withTrashed()->findOrFail($id);
        $saran->restore();

        return redirect()->route('dashboard_admin.onlytrash')->with('success', 'Data berhasil dipulihkan.');
    }

}
