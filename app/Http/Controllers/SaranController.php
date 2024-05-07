<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Saran;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class SaranController extends Controller
{
    public function index(): View {
        $saran = Saran::latest()->get();
        return view('admin.saran.saranList', compact('saran'));
    }

    public function store(Request $request) {
        $validatedData = $request->validate([
            // 'name' => 'required|string|max:255',
            // 'email' => 'required|string|email|max:255',
            'saran' => 'required'
        ]);

        Saran::create($validatedData);
        return redirect()->back()->with('success', 'Pesan Anda telah terkirim.');
    }

    public function destroy($id): RedirectResponse {
        $saran = Saran::withTrashed()->findOrFail($id);
        $saran->forceDelete(); 
        return redirect()->route('dashboard_admin.onlytrash')->with('success', 'Data berhasil dihapus secara permanen.');
    }

    public function softDelete($id)
    {
        $saran = Saran::findOrFail($id);
        $saran->delete(); 

        return redirect()->route('dasbhoard_admin.index')->with('success', 'Data berhasil dihapus secara lembut.');
    }

    public function onlyTrashSaran() :view 
{
    $saranTrash = Saran::onlyTrashed()->latest()->get();

    return view('admin.saran.softDeleteSaran', compact('saranTrash'));
}

public function restore($id)
{
    $saran = Saran::withTrashed()->findOrFail($id);
    $saran->restore(); 

    return redirect()->route('dashboard_admin.onlytrash')->with('success', 'Data berhasil dipulihkan.');
}

}
