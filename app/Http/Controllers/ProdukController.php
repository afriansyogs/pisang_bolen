<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Carbon\Carbon;
use Illuminate\Support\Str;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;

class ProdukController extends Controller
{

    public function index() {
        $products = Product::all();
        return view('Produk/User/Produk', compact('products'));
    }

    public function admin() {
        $products = Product::all();
        return view('Produk/Admin/AdmProduk', compact('products'));
    }

    public function create() {
        return view('Produk/Admin/AddProduk');
    }


    public function store(Request $request) {

            // validate form
            $request->validate( [
                'foto_product' => 'image|mimes:jpeg,png,jpg',
                'harga_product' => 'numeric',
                'jumlah_product' => 'integer',
                'slug_link' => 'unique:products,slug_link',
            ]);

            $imageName = time().'.'.$request->foto_product->extension();
            $request->foto_product->move(public_path('storage/images/'), $imageName);

            $slug = Str::slug($request->variant_product, '_');

            Product::create([
                //'foto_product' => $image->hashName(),
                'foto_product' => $imageName,
                'variant_product' => $request->variant_product,
                'description_product' => $request->description_product,
                'harga_product' => $request->harga_product,
                'jumlah_product' => $request->jumlah_product,
                // 'status_publish' => $request->status_publish,
                'slug_link' => $slug,
            ]);

            // direct to index
            return redirect()->route('Admin.admin')->with(['success' => 'Berhasil menambahkan produk !'])->with('image',$imageName);
        }

        public function edit(string $slug_link) {
            $products = Product::where('slug_link', '=', $slug_link)->firstorfail();
            return view('Produk/Admin/EditProduk', compact('products'));
        }


        public function update(Request $request, string $slug_link) {

            // validate form
            $request->validate( [
                'foto_product' => 'image|mimes:jpeg,png,jpg',
                'harga_product' => 'numeric',
                'jumlah_product' => 'integer',
                'slug_link' => 'unique:products,slug_link',
            ]);

            $imageName = time().'.'.$request->foto_product->extension();
            $request->foto_product->move(public_path('storage/images/'), $imageName);

            $slug = Str::slug($request->variant_product, '_');

            $products = Product::where('slug_link', $slug_link)->firstorfail();
            $products->update([
                //'foto_product' => $image->hashName(),
                'foto_product' => $imageName,
                'variant_product' => $request->variant_product,
                'description_product' => $request->description_product,
                'harga_product' => $request->harga_product,
                'jumlah_product' => $request->jumlah_product,
                // 'status_publish' => $request->status_publish,
                'slug_link' => $slug,
            ]);

            return redirect()->route('Admin.admin')->with(['success' => 'Berhasil memperbarui produk !'])->with('image',$imageName);
    }


    public function hapus(string $slug_link) {
        $products = Product::where('slug_link', '=', $slug_link)->withTrashed()->firstOrFail();
        return view('Produk.Admin.HapusProduk', compact('products'));
     }

        public function softdelete(Request $request, $slug_link) {
            $products = Product::where('slug_link', $slug_link)->withTrashed()->firstOrFail();
            $products->delete();

        return redirect()->route('Admin.admin')->with(['success' => 'Berhasil menghapus produk !']);
     }

        public function restore(Request $request, $slug_link) {
            // Temukan produk yang telah dihapus
            $products = Product::onlyTrashed()->where('slug_link', $slug_link)->firstOrFail();
            // Memulihkan produk
            $products->restore();

            // Redirect ke halaman history dengan pesan sukses
            return redirect()->route('Admin.admin')->with(['success' => 'Berhasil memulihkan produk !']);
     }

        public function history() {
            $products = Product::onlyTrashed()->get();
            return view('Produk.Admin.HistoryProduk', compact('products'));
     }

        public function deletePermanent($id) : RedirectResponse {
            $products = Product::withTrashed()->findOrFail($id);
            $products->forceDelete();

            return redirect()->route('Admin.history')->with(['success' => 'Berhasil menghapus produk secara permanen!']);
    }


    // public function addFavorite(Product $products) {
    //     auth()->user()->favorites()->attach($products->id);
    //     return response()->json(['success' => 'Berhasil menambahkan produk ke favorite !']);
    // }

    // public function removeFavorite(Product $products) {
    //     auth()->user()->favorites()->detach($products->id);
    //     return response()->json(['success' => 'Berhasil menghapus produk dari favorite !']);
    // }



        public function show($slug_link) {
            $products = Product::where('slug_link', $slug_link)->first();
            return view('Produk.User.DetailProduk', compact('products'));
        }

    public function search(Request $request) {
        $query = $request->input('query');
        $products = Product::where('variant_product', 'LIKE', "%{$query}%")
                     ->orWhere('description_product', 'LIKE', "%{$query}%")
                     ->get();

        return view('Produk/User/Produk', compact('products'));
    }
}
