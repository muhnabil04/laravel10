<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class DashboardKategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kategori = Kategori::latest('id', 'desc')->cari(request(['pencarian']));
        return view('dashboard.kategori.index', ['kategori' => $kategori->get()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.kategori.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validated = $request->validate([
            'nama' => 'required|unique:kategoris',
        ]);


        Kategori::create($validated);

        return redirect('/dashboard/kategori')->with('berhasil', 'Kategori baru berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kategori $kategori)
    {
        return view('dashboard.kategori.edit', ['kategori' => $kategori]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kategori $kategori)
    {
        $rule = [
            'nama' => 'required',
        ];

        if ($request->nama != $kategori->nama) {
            $rule['nama'] = 'required|unique:kategoris';
        }

        $validated = $request->validate($rule);

        Kategori::where('id', $kategori->id)->update($validated);

        return redirect('/dashboard/kategori')->with('berhasil', 'Update Kategori berhasil');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kategori $kategori)
    {
        Kategori::destroy($kategori->id);

        return redirect('/dashboard/kategori')->with('berhasil', 'Data berhasil di hapus');
    }
}
