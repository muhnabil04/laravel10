<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Unit;

class UnitController extends Controller
{
    public function index()
    {
        $unit = Unit::latest('id', 'desc')->cari(request(['pencarian']));
    }
}
