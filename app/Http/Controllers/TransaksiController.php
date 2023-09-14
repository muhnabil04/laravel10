<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Exports\ExportExcel;
use Illuminate\Http\Request;
use App\Models\TransaksiDetail;
use PHPUnit\Event\Tracer\Tracer;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\PDF as PDF;

class TransaksiController extends Controller
{
    public function index()
    {
        $transaksi = Transaksi::latest('id', 'desc')->with(['user'])->where('user_id', auth()->user()->id);
        return view('transaksi.index', ['halaman' => 'Transaksi', 'transaksi' => $transaksi->get()]);
    }

    public function detail($id)
    {
        $transaksi = TransaksiDetail::with(['transaksi', 'produk'])->orderBy('produk_id', 'asc')->where('transaksi_id', $id);
        return view('transaksi.detail', ['halaman' => 'Detail Transaksi', 'detail' => $transaksi->get()]);
    }

    public function downloadpdf($id)
    {
        $data = TransaksiDetail::with(['transaksi', 'produk'])->where('transaksi_id', $id)->get();

        view()->share('data', $data);
        $pdf = PDF::loadview('transaksi.struk-pdf');
        $pdf->setPaper([0, 0, 260, 383.5], 'portrait');
        $pdf->setOption('margin-left', 0);
        $pdf->setOption('margin-right', 0);
        $pdf->setOption('margin-top', 0);
        $pdf->setOption('margin-bottom', 0);

        return $pdf->download('struk.pdf');
    }

    public function exportExcel()
    {
        return  Excel::download(new ExportExcel, 'Report.xlsx');
    }
}
