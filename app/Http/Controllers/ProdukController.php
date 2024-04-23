<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Carbon\Carbon;
use Illuminate\Support\Str;
use App\Models\Product;

class ProdukController extends Controller
{

    public function index()
    {
        return view('Produk/User/Produk');
    }

    // public function fav() {
    //     return view('Produk/User/Fav');
    // }

    public function admin()
    {
        $products = Product::all();
        return view('Produk/Admin/AdmProduk', compact('products'));
    }

    public function history()
    {
        $products = Product::latest()->get();
        return view('Produk/Admin/HistoryProduk', compact('products'));
    }

    public function create()
    {
        return view('Produk/Admin/AddProduk');
    }


    public function store(Request $request)
    {
        // Validasi data
        $request->validate([
            'foto_product' => 'image|mimes:jpeg,png,jpg',
            'harga_product' => 'numeric',
            'jumlah_product' => 'integer',
            'slug_link' => 'unique:products,slug_link',
            // 'foto_product' => 'required|image|mimes:jpeg,png,jpg',
            // 'variant_product' => 'required',
            // 'description_product' => 'required',
            // 'harga_product' => 'required|numeric',
            // 'jumlah_product' => 'required|integer',
            // 'status_publish' => 'required',
            // 'slug_link' => 'required|unique:products,slug_link',
        ]);

        $image = $request->file('foto_product');
        $image->storeAs('public/product', $image->hashName());

        $slug = Str::slug($request->slug_link, '_');

        $products = new Product([
            'foto_product' => $image->hashName(),
            'variant_product' => $request->input('variant_product'),
            'description_product' => $request->input('description_product'),
            'harga_product' => $request->input('harga_product'),
            'jumlah_product' => $request->input('jumlah_product'),
            'status_publish' => $request->input('status_publish'),
            'slug_link' => $slug,
        ]);

        $products->save();

        return redirect()->route('Admin.admin')->with(['success' => 'Berhasil menambahkan produk !']);
    }


    public function edit(string $slug_link)
    {

        $products = Product::where('slug_link', '=', $slug_link)->firstorfail();
        return view('Produk/Admin/EditProduk', compact('products'));
    }


    public function update(Request $request, string $slug_link)
    {

        $foto = Str::of($request->foto_product);
        $var = Str::of($request->variant_product);
        $desc = Str::of($request->description_product);
        $hrg = Str::of($request->harga_product);
        $jml = Str::of($request->jumlah_product)
            ->rtrim() //buang spasi berlebih
            ->stripTags() //menghilangkan code html dan
            ->title(); //semua awalan kata jadi kapital
        $slug = Str::slug($request->slug_link, '_');
        $products = Product::where('slug_link', $slug_link)->firstorfail();
        $products->update([
            'foto_product' => $foto,
            'variant_product' => $var,
            'description_product' => $desc,
            'harga_product' => $hrg,
            'jumlah_product' => $jml,
            'status_publish' => $request->status_sublish,
            'slug_link' => $slug,
        ]);

        return redirect()->route('Admin.admin')->with(['success' => 'Berhasil mengubah data produk !']);
    }


    public function hapus(string $slug_link)
    {

        $products = Product::where('slug_link', '=', $slug_link)->firstorfail();
        return view('Produk/Admin//HapusProduk', compact('products'));
    }


    public function softdelete(Request $request, string $slug_link)
    {

        $foto = Str::of($request->foto_product);
        $var = Str::of($request->variant_product);
        $desc = Str::of($request->description_product);
        $hrg = Str::of($request->harga_product);
        $jml = Str::of($request->jumlah_product)
            ->rtrim() //buang spasi berlebih
            ->stripTags() //menghilangkan code html dan
            ->title(); //semua awalan kata jadi kapital
        $slug = Str::slug($request->slug_link, '_');
        $products = Product::where('slug_link', $slug_link)->firstorfail();
        $products->update([
            'foto_product' => $foto,
            'variant_product' => $var,
            'description_product' => $desc,
            'harga_product' => $hrg,
            'jumlah_product' => $jml,
            'status_publish' => $request->status_sublish,
            'slug_link' => $slug,
        ]);

        return redirect()->route('Admin.admin')->with(['success' => 'Berhasil menghapus produk !']);
    }
}
