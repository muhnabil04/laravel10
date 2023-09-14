<?php

namespace App\Http\Controllers;

use App\Models\Keranjang;
use App\Models\Produk;
use App\Models\Whislist;
use Illuminate\Http\Request;

class WhislistController extends Controller
{
    public function index()
    {
        $whislist = Whislist::where('user_id', auth()->user()->id)->get();
        return view('whislist', ['halaman' => 'Favorit', 'whislist' => $whislist]);
    }

    public function store(Request $request)
    {
        Whislist::create([
            'produk_id' => $request->prdId,
            'user_id' => auth()->user()->id
        ]);
    }

    public function destroy($id)
    {
        Whislist::where(['produk_id' => $id, 'user_id' => auth()->user()->id])->delete();

        $whislist = Whislist::with(['user', 'produk'])->where('user_id', auth()->user()->id)->get();

        $view = view('partials.favorit', ['whislist' => $whislist])->render();

        return response()->json(['html' => $view]);
    }

    public function favoritStore(Request $request)
    {
        $existFavorit = Keranjang::where(['produk_id' => $request->produk_id, 'user_id' => auth()->user()->id, 'status' => 0])->first();

        if ($existFavorit) {
            $existFavorit->update([
                'kuantitas' => $existFavorit->kuantitas + 1
            ]);
        } else {
            $keranjang = new Keranjang([
                'date' => now(),
                'produk_id' => $request->produk_id,
                'user_id' => auth()->user()->id,
                'status' => 0,
                'kuantitas' => $request->kuantitas
            ]);
            $keranjang->save();
        }
    }
}
