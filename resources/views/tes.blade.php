@extends('layouts.template')

@section('landing')

<div class="container">
 <div class="row d-flex justify-content-center">
    @foreach ($tes as $data)
<div class="col-md-3 mt-3">
            <div class="card">
              <img src="{{ asset('img/sharon-pittaway-KUZnfk-2DSQ-unsplash.jpg') }}" class="card-img-top" alt="#" style="max-height: 12rem; min-height: 12rem;" />
              <div class="card-body">
                <p class="card-text fs-5">
                  <strong>{{ $data->nama }} </strong>
                  <p class="card-text"><a class="text-success" href="/produk/{{ $data->id }}/{{ $data->kategori_id }}">{{ $data->kategori->nama }}<img src="img/cart2.svg" alt=""> </a></p>
                </p>
                <div class="d-flex justify-content-between">
                <p class="card-text">Rp. {{ $data->harga }}</p>
                <a href=""><img class="" src="{{ asset('img/cart2.svg') }}" alt=""></a>
                </div>
              <div class="d-flex justify-content-center">
                <button type="button" name="beli" class="btn btn-outline-success" style="width: 200px">Beli</button>
              </div>
              </div>
            </div>
</div>
    @endforeach
</div>
</div>

@endsection