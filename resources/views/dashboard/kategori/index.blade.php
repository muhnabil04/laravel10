@extends('dashboard.layouts.template')


@section('landing')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-3 mb-3 border-bottom">
    <h1 class="h2">Kategori</h1>
</div>

@if (session()->has('berhasil'))
    <div class="alert alert-success alert-dismissible fade show mt-2 col-md-12 col-lg-6" role="alert">
        {{ session('berhasil') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<a href="/dashboard/kategori/create" class="btn btn-primary mb-3">Tambah Kategori</a>

<div class="table-responsive small col-lg-4">
            <table class="table table-striped table-sm">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Kategori</th>
                  <th scope="col" class="col-sm-2 text-center">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($kategori as $data )
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $data->nama }}</td>
                  <td>
                    <div class="d-flex">
                    <a href="/dashboard/kategori/{{ $data->id }}/edit" class="me-3 badge btn btn-warning"><i class="bi bi-pencil-square fs-5 d-inline"></i></a>
                    <form action="/dashboard/kategori/{{ $data->id }}" method="post">
                      @method('delete')
                      @csrf
                      <button class="badge btn btn-danger" onclick="return confirm('Hapus kategori ?')"><i class="bi bi-x-square fs-5 d-inline"></i></button>
                    </form>
                    </div>
                  </td>
                </tr> 
                @endforeach
              </tbody>
            </table>
          </div>


@endsection