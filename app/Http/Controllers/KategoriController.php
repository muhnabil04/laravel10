<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;

class KategoriController extends Controller
{
    public function index()
    {
        $kategori = Kategori::latest('id', 'desc')->cari(request(['pencarian']));
        return view('kategori', ['halaman' => 'Kategori', 'aksi' => '/kategori', 'kategori' => $kategori->get()]);
    }
}
