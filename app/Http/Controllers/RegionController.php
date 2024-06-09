<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Region;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class RegionController extends Controller
{
    public function index(): View {
        $region = Region::get();
        return view('admin.region.index', compact('region'));
    }

    public function create(): View
    {
        return view('admin.region.formAddRegion');
    }

    public function store(Request $request) {
        $this->validate($request, [
            'provinsi' => 'required',
            'kote'     => 'required',
            'ongkir'   => 'required'
        ]);

        Region::create([
            'provinsi' => $request->provinsi,
            'kote'     => $request->kote,
            'ongkir'   => $request->ongkir
        ]);

        return redirect()->route('region.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function softDelete($id) {
        $region = Region::findOrFail($id);
        $region->delete();

        return redirect()->route('region.index')->with('success', 'Data berhasil dihapus secara lembut.');
    }

    public function onlyTrashRegion():view {
        $regionTrash = Region::onlyTrashed()->latest()->get();
        return view('admin.region.history', compact('regionTrash'));
    }

    public function restore($id) {
        $region = Region::withTrashed()->findOrFail($id);
        $region->restore();

        return redirect()->route('region.onlytrash')->with('success', 'Data berhasil dipulihkan.');
    }

    public function destroy($id): RedirectResponse {
        $region = Region::withTrashed()->findOrFail($id);
        $region->forceDelete();
        return redirect()->route('region.onlytrash')->with('success', 'Data berhasil dihapus secara permanen.');
    }

    public function getProvinces() {
        $provinces = Region::select('provinsi')->distinct()->get();
        return response()->json($provinces);
    }

    public function getCities(Request $request) {
        $cities = Region::where('provinsi', $request->provinsi)->select('kota', 'ongkir')->get();
        return response()->json($cities);
    }
}
