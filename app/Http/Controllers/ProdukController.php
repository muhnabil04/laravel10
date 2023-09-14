<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Whislist;

class ProdukController extends Controller
{
    public function index()
    {
        $produk = Produk::with(['kategori', 'unit'])->latest('id', 'desc')->cari(request(['pencarian', 'kategori']));
        return view('produk', ['halaman' => 'Produk', 'aksi' => '/produk', 'produk' => $produk->paginate(8)->withQueryString(), 'whislist' => Whislist::where(['user_id' => auth()->user()->id, 'produk_id' => 3])->get()]);
    }

    // public function show($id, $kategori)
    // {
    //     $post = Produk::show($kategori)->get();
    //     // $post = Produk::where('kategori_id', $kategori)->get();
    //     return view('item', ['post' => $post]);
    // }
}
