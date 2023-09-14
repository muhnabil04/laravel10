@extends('dashboard.layouts.template')


@section('landing')
{{-- <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Welcome to Dashboard <span class="text-success">{{ auth()->user()->name }}</span></h1> --}}
    
<main>
    <div class="container py-4">
        <div class="row">

      <div class="col-md-4 my-1">
        <div class="h-80 p-5 text-bg-dark rounded-3">
          <h3>Daftar Produk</h3>
          <p>Tambah, edit dan hapus Produk kamu di sini</p>
          <a class="btn btn-outline-light" type="button" href="/dashboard/produk"><i class="bi bi-wrench-adjustable"></i></a>
        </div>
      </div>

      <div class="col-md-4 my-1">
        <div class="h-80 p-5 bg-body-tertiary border rounded-3">
          <h3>Kategori Produk</h3>
          <p>Tambah, edit dan hapus kategori produk kamu di sini</p>
          <a class="btn btn-outline-secondary" type="button" href="/dashboard/kategori"><i class="bi bi-wrench-adjustable"></i></a>
        </div>
      </div>

       <div class="col-md-4 my-1">
        <div class="h-80 p-5 text-bg-dark rounded-3">
          <h4>Daftar satuan produk</h4>
          <p>Tambah, edit dan hapus satuan produk kamu di sini</p>
          <a class="btn btn-outline-light" type="button" href="/dashboard/unit"><i class="bi bi-wrench-adjustable"></i></a>
        </div>
      </div>

    </div>
  </div>
</main>
    
@endsection