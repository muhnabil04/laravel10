<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use Illuminate\Http\Request;

class DashboardUnitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $unit = Unit::latest('id', 'desc')->cari(request(['pencarian']));
        return view('dashboard.unit.index', ['unit' => $unit->get()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.unit.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|unique:units',
        ]);

        Unit::create($validated);

        return redirect('dashboard/unit')->with('berhasil', 'Satuan baru berhasil ditambahkan');
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
    public function edit(Unit $unit)
    {
        return view('dashboard.unit.edit', ['unit' => $unit]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Unit $unit)
    {
        $rule = [
            'nama' => 'required'
        ];

        if ($request->nama != $unit->nama) {
            $rule['nama'] = 'required|unique:units';
        }

        $validated = $request->validate($rule);

        Unit::where('id', $unit->id)->update($validated);

        return redirect('/dashboard/unit')->with('berhasil', 'Update satuan berhasil');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Unit $unit)
    {
        Unit::destroy($unit->id);

        return redirect('dashboard/unit')->with('berhasil', 'Data berhasil di hapus');
    }
}
