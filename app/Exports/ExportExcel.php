<?php

namespace App\Exports;

use App\Models\Transaksi;
use illuminate\Contracts\view\view;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class ExportExcel implements FromCollection, WithMapping, WithHeadings
{

    use Exportable;

    /**
     * @return \Illuminate\Support\Collection
     */


    public function collection()
    {
        return Transaksi::all();
    }

    public function map($transaksi): array
    {
        return [
            $transaksi->user->name,
            $transaksi->date,
            $transaksi->harga
        ];
    }

    public function headings(): array
    {
        return [
            'Nama',
            'Tanggal',
            'Total'
        ];
    }

    // public function view(): view
    // {
    //     return view('exceltmplt', ['transaksi' => Transaksi::all()]);
    // }
}
