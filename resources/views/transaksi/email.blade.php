<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Struk</title>
    <style>
        @page { margin:0px; }
        body {
            font-family: Arial, sans-serif;
            width: 76mm; /* Set the width to match the receipt paper width */
            margin: 0; /* Remove default margin */
            padding: 10mm; /* Add padding to align content within paper */
        }
        .header {
            font-size: 16px;
            margin-bottom: 10px;
        }
        .divider {
            margin: 10px 0;
            border-top: 1px dashed #000;
        }
        .item {
            font-size: 12px;
            margin: 5px 0;
        }
        .total {
            font-weight: bold;
            font-size: 14px;
            text-align: right;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="header">
        <p align="center">fahriMart</p>
        <div class="divider"></div>
        {{ auth()->user()->name }}
        <div class="divider"></div>
        @foreach ($data as $index => $struk)
            @if ($index == 0)
                {{ date('d F Y', strtotime($struk->transaksi->date)) }}
            @endif
        @endforeach
    </div>

    <div class="content">
    <div class="divider"></div>
    <div class="items">
    @php
        $total = 0;
    @endphp
    @foreach ($data as $struk)
        <div class="item">{{ $struk->kuantitas }}x {{ $struk->produk->nama }} = Rp. {{ number_format($struk->kuantitas * $struk->produk->harga) }}</div>
        @php
            $total += $struk->kuantitas * $struk->produk->harga;
        @endphp
    @endforeach
    </div>
    <div class="divider"></div>

    <div class="total">Total : Rp. {{ number_format($total) }}</div>

    </div>
</body>
</html>