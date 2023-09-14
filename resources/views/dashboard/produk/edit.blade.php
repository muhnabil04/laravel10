@extends('dashboard.layouts.template')

@section('landing')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-3 mb-3 border-bottom">
    <h1 class="h2">Update Data Produk</h1>
</div>

<div class="col-lg-6">
<form action="/dashboard/produk/{{ $produk->nama }}" method="post">
    @method('put')
    @csrf
  <div class="row mb-3">
    <div class="col-sm-10">
        <label for="nama" class="col-form-label">Nama Produk</label>
        <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" id="nama" placeholder="produk..." value="{{ old('nama', $produk->nama) }}">
        @error('nama')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
  </div>
  <div class="row mb-3">
    <div class="col-sm-10">
        <label for="kategori" class="col-form-label">Kategori Produk</label>
    <select name="kategori_id" id="kategori" class="form-select">
        @foreach ($kategori as $data )
        @if (old('kategori_id', $produk->kategori_id) == $data->id)
        <option value="{{ $data->id }}" selected>{{ $data->nama}}</option>
        @else
        <option value="{{ $data->id }}">{{ $data->nama }}</option>
        @endif 
        @endforeach
    </select>
    </div>
  </div>
  <div class="row mb-3">
    <div class="col-sm-5">
        <label for="harga" class="col-form-label">Harga Produk</label>
        <input type="number" name="harga" class="form-control @error('harga') is-invalid @enderror" id="harga" placeholder="Rp. xxx.xxx,xx" value="{{ old('harga', $produk->harga) }}">
        @error('harga')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
  </div>
  <div class="row mb-3">
    <div class="col-sm-12">
        <label for="berat" class="col-form-label">Berat Produk</label>
    </div>
    <div class="col-sm-3">
        <input type="number" name="berat" class="form-control @error('berat') is-invalid @enderror" id="berat" placeholder="xx kg" value="{{ old('berat', $produk->berat) }}">
        @error('berat')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
    <div class="col-sm-3">
        <select name="unit_id" class="form-select">
        @foreach ($unit as $data)
        @if (old('unit_id', $produk->unit_id) == $data->id)
        <option value="{{ $data->id }}" selected>{{ $data->nama}}</option>
        @else
        <option value="{{ $data->id }}">{{ $data->nama}}</option>
        @endif
        @endforeach
        </select>
    </div>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>

@endsection