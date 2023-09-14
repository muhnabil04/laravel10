@extends('layouts.template')

@section('landing')
<div class="container mt-3">
    @if (count($transaksi))
    @foreach ($transaksi as $data)
    <div class="col-md-12 my-1">
        <div class="h-55 p-2 bg-body-tertiary border rounded-3 d-flex justify-content-evenly">
            <div class="col ms-3 pt-1 lh-base">
                <div class="row d-flex">
                    <div class="col-md-3">
                        <p class="">Total harga : <span class="text-danger">Rp. {{ number_format($data->harga) }}</span></p>
                    </div>
                    <div class="col-md-3">
                        <p class="">{{ date('j F Y', strtotime($data->date)) }}</p>
                    </div>
                    <div class="col-md-3">
                        <p>User: {{ auth()->user()->username }}</p>
                    </div>
                    <div class="col-md-3">
                        <a class="text-info" href="/transaksi/{{ $data->id }}">Detail</a>
                    </div>
                </div>
            </div>
            <div class="d-flex align-items-end">
                <p class="text-secondary" style="font-size: 12px">{{ date('H:i', strtotime($data->date)) }}</p>
            </div>
        </div>
    </div>
        @endforeach
        @else
        <div class="container d-flex align-items-end justify-content-center" style="height: 40vh">
            <h5 class="text-secondary">there is no item</h5>
        </div>
        @endif
</div>
@endsection