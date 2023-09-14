@extends('dashboard.layouts.template')

@section('landing')

<div id="carouselExample" class="carousel slide">
  <div class="carousel-inner" style="max-height: 50vh">
    <div class="carousel-item active">
      <img src="{{ asset('img/sharon-pittaway-KUZnfk-2DSQ-unsplash.jpg') }}" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item active">
      <img src="{{ asset('img/sharon-pittaway-KUZnfk-2DSQ-unsplash.jpg') }}" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="{{ asset('img/sharon-pittaway-KUZnfk-2DSQ-unsplash.jpg') }}" class="d-block w-100" alt="...">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" produk-bs-target="#carouselExample" produk-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" produk-bs-target="#carouselExample" produk-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>



    <table class="table table-striped table-sm">
    <thead>
    <tr>
        <th scope="col">{{ $produk->nama }}</th>
    </tr>
    <tr>
         <th scope="col">{{ $produk->kategori->nama }}</th>
    </tr>
    <tr>
        <th scope="col">{{ $produk->berat }} {{ $produk->unit->nama }}</th>
    </tr>
    <tr>
        <th scope="col">Rp. {{ $produk->harga }}</th>
    </tr>
    </thead>
    </table>
    </div>
@endsection