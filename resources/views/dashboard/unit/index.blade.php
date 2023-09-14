@extends('dashboard.layouts.template')

@section('landing')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-3 mb-3 border-bottom">
    <h1 class="h2">Satuan</h1>
</div>

@if (session()->has('berhasil'))
    <div class="alert alert-success alert-dismissible fade show mt-2 col-md-12 col-lg-6" role="alert">
        {{ session('berhasil') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<a href="/dashboard/unit/create" class="btn btn-primary mb-3">Tambah Satuan</a>


<div class="table-responsive small col-lg-3">
            <table class="table table-striped table-sm">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Satuan</th>
                  <th scope="col" class="text-center col-sm-2">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($unit as $data )
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $data->nama }}</td>
                  <td>
                    <div class="d-flex">
                    <a href="/dashboard/unit/{{ $data->id }}/edit" class="me-1 badge btn btn-warning"><i class="bi bi-pencil-square fs-6 d-inline"></i></a>
                    <form action="/dashboard/unit/{{ $data->id }}" method="post">
                      @method('delete')
                      @csrf
                      <button class="badge btn btn-danger" onclick="return confirm('Hapus Data?')"><i class="bi bi-x-square fs-6 d-inline"></i></button>
                    </form>
                    </div>
                  </td>
                </tr> 
                @endforeach
              </tbody>
            </table>
          </div>

@endsection