@extends('layouts.template')

@section('landing')

<div class="container">
 <div class="row d-flex justify-content-center">
@foreach ($kategori as $data)
<div class="col-md-4 mt-3">
            <div class="card">
              <div class="card-body">
                <p class="card-text fs-5">
                  <strong class="d-flex justify-content-center"><a class="text-success" href="\produk?kategori={{ $data->nama }}">{{ $data->nama }}</a></strong>
                </p>
              </div>
              <img src="img/sharon-pittaway-KUZnfk-2DSQ-unsplash.jpg" class="card-img-bottom" alt="#" style="max-height: 12rem; min-height: 12rem;" />
            </div>
</div>
@endforeach
</div>
</div>

@include('partials.perenggang')
@endsection