<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\UNit;
use App\Models\Kategori;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;

class DashboardProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $produk = Produk::with(['kategori'])->latest('id', 'desc')->cari(request(['pencarian', 'kategori']));
        return view('dashboard.produk.index', ['produk' => $produk->paginate(10)->withQueryString()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kategori = Kategori::all();
        $unit = Unit::all();
        return view('dashboard.produk.create', ['kategori' => $kategori, 'unit' => $unit]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validated = $request->validate([
            'nama' => 'required|unique:produks|max:50',
            'kategori_id' => 'required',
            'harga' => 'required|numeric|min:500|max:1000000000',
            'berat' => 'required',
            'unit_id' => 'required',
        ]);

        Produk::create($validated);

        return redirect('/dashboard/produk')->with('berhasil', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Produk $produk)
    {

        return view('dashboard.produk.show', ['produk' => $produk]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Produk $produk)
    {
        $kategori = Kategori::all();
        $unit = Unit::all();
        return view('dashboard.produk.edit', ['produk' => $produk, 'kategori' => $kategori, 'unit' => $unit]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Produk $produk)
    {
        $rules = [
            'nama' => 'required',
            'kategori_id' => 'required',
            'harga' => 'required|numeric|min:500',
            'berat' => 'required',
            'unit_id' => 'required',
        ];

        if ($request->nama != $produk->nama) {
            $rules['nama'] = 'required|unique:produks';
        }

        $validated = $request->validate($rules);

        Produk::where('id', $produk->id)->update($validated);

        return redirect('/dashboard/produk')->with('berhasil', 'Update data berhasil');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Produk $produk)
    {
        Produk::destroy($produk->id);
        return redirect('/dashboard/produk')->with('berhasil', 'Data berhasil dihapus');
    }
}
