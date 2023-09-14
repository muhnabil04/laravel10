@extends('dashboard.layouts.template')

@section('landing')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-3 mb-3 border-bottom">
    <h1 class="h2">Tambah Satuan Baru</h1>
</div>

<div class="col-lg-6">
<form action="/dashboard/unit/{{ $unit->id }}" method="post">
    @method('put')
    @csrf
  <div class="row mb-3">
    <div class="col-sm-10">
        <div class="form-floating">
        <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" id="nama" placeholder="kategori..." value="{{ old('nama', $unit->nama) }}">
        <label for="nama" class="col-form-label">Satuan</label>
        </div>
        @error('nama')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>


@endsection