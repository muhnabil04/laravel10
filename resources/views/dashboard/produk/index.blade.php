@extends('dashboard.layouts.template')

@section('landing')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-3 mb-3 border-bottom">
    <h1 class="h2">Produk</h1>
</div>

@if (session()->has('berhasil'))
    <div class="alert alert-success alert-dismissible fade show mt-2 col-md-8" role="alert">
        {{ session('berhasil') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<div class="d-flex justify-content-between">
  <a href="/dashboard/produk/create" class="btn btn-primary mb-3">Tambah Produk</a>
            {{ $produk->links() }}
</div>

<div class="table-responsive col-lg-8">
            <table class="table table-striped table-sm">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Produk</th>
                  <th scope="col">Kategori</th>
                  <th scope="col">Berat</th>
                  <th scope="col">Harga</th>
                  <th scope="col" class=" col-2 text-center">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($produk as $data )
                <tr class="fs-6">
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $data->nama }}</td>
                  <td>{{ $data->kategori->nama ?? 'N/A'}}</td>
                  <td>
                  @if($data->unit->nama ?? '' === null)
                  {{ $data->berat }} {{ $data->unit->nama ?? 'N/A'}}
                  @else
                  N/A
                  @endif
                  </td>
                  <td>Rp. {{ number_format($data->harga, 0, ',', ',') }}</td>
                  <td>
                    <div class="d-flex">
                    <a href="/dashboard/produk/{{ $data->nama }}" class="badge btn btn-info"><i class="bi bi-eye fs-5 d-inline"></i></a>
                    <a href="/dashboard/produk/{{ $data->nama }}/edit" class="mx-1 badge btn btn-warning"><i class="bi bi-pencil-square fs-5 d-inline"></i></a>
                    <form action="/dashboard/produk/{{ $data->nama }}" method="post">
                    @method('delete')
                    @csrf
                    <button class="badge btn btn-danger" onclick="return confirm(' hapus produk {{ $data->nama }} ')"><i class="bi bi-x-square fs-5 d-inline"></i></button>
                    </form>
                    </div>
                  </td>
                </tr> 
                @endforeach
              </tbody>
            </table>
          </div>

@endsection