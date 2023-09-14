@extends('layouts.template')


@section('landing')
<div class="perenggang"></div>

  <!-- biodata -->
  <div id="biodata"></div>

  <section class="container list-group shadow-sm mt-5">
    <div class="row text-center pb-4 pt-3 list-group-item">
      <h2 class="fs-2 fw-light">Biodata</h2>
    </div>
    @foreach ($biodata as $data )

    <div class="row pt-3 list-group-item d-flex">
      <div class="col-md-4"><strong>Nama Lengkap</strong></div>
      <div class="col-md-4">: {{ $data->nama }}</div>
    </div>
    <div class="row pt-3 list-group-item d-flex">
      <div class="col-md-4"><strong>Jenis Kelamin</strong></div>
      <div class="col-md-4">: {{ $data->jk }}</div>
    </div>
    <div class="row pt-3 list-group-item d-flex">
      <div class="col-md-4"><strong>TTL</strong></div>
      <div class="col-md-4">: {{ $data->ttl }}</div>
    </div>
    <div class="row pt-3 list-group-item d-flex">
      <div class="col-md-4"><strong>Agama</strong></div>
      <div class="col-md-4">: {{ $data->agama }}</div>
    </div>
    <div class="row pt-3 list-group-item d-flex">
      <div class="col-md-4"><strong>Alamat</strong></div>
      <div class="col-md-4">: {{ $data->alamat }}</div>
    </div>
    <div class="row pt-3 list-group-item d-flex justify-content-center">
      <div>&nbsp;</div>
    </div>
    
    @endforeach
  </section>
@endsection