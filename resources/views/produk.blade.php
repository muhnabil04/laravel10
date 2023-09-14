@extends('layouts.template')

@section('landing')
<div class="tampildata"></div>
<div class="container">
    <div class="pt-3">{{ $produk->links() }}</div>
    <div class="row justify-content-center">
        @if (count($produk))
            @foreach ($produk as $data)
                <div class="col-md-3 mt-3">
                    <div class="card">
                        <img src="{{ asset('img/sharon-pittaway-KUZnfk-2DSQ-unsplash.jpg') }}" class="card-img-top"
                            alt="#" style="max-height: 12rem; min-height: 12rem;" />
                        <div class="card-body">
                            <p class="card-text fs-5">
                                <strong>{{ $data->nama }}</strong>
                                <p class="card-text">
                                    @if (count($produk))
                                        <a class="text-success" href="/produk?kategori={{ $data->kategori->nama }}"> {{ $data->kategori->nama }}</a>
                                    @else
                                        N/A
                                    @endif
                                </p>
                            </p>
                            <p class="card-text">berat : {{ $data->berat }} {{ $data->unit->nama ?? 'N/A' }}</p>
                            <p class="card-text">Rp. {{ number_format($data->harga) }}</p>
                            @auth
                            <div class="d-flex col-md-3">
                                <form class="add-to-cart-form">
                                    @csrf
                                    <input type="hidden" name="kuantitas" value="1">
                                    <input type="hidden" name="produk_id" value="{{ $data->id }}">
                                    <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                                    <input type="hidden" name="date" value="{{ now() }}">
                                    <input type="hidden" name="status" value="0">
                                    <div class="d-flex justify-content-center">
                                        <button class="btn btn-outline-success" type="button" onclick="store(this)"style="width: 190px">
                                            Add to cart <i class="bi bi-cart-plus"></i>
                                        </button> 
                                    </div>
                                </form>
                                <form class="whislist">
                                    <div class="d-flex justify-content-center ms-1">
                                       @php
                                            $wishlistStatus = cekProduk(auth()->user()->id, $data->id);
                                        @endphp
                                        @if ($wishlistStatus == 'remove')
                                        <button id="unstarBtn-{{ $data->id }}" type="button" class="btn btn-success" onclick="removeWhislist({{ $data->id }})"><i class="bi bi-star-fill fs-6"></i></button>
                                        <button id="starBtn-{{ $data->id }}" type="button" class="btn btn-outline-success" style="display: none" onclick="addWhislist({{ $data->id }})"><i class="bi bi-star fs-6"></i></button>
                                        @else    
                                        <button id="starBtn-{{ $data->id }}" type="button" class="btn btn-outline-success" onclick="addWhislist({{ $data->id }})"><i class="bi bi-star fs-6"></i></button>
                                        <button id="unstarBtn-{{ $data->id }}" type="button" class="btn btn-success" style="display: none" onclick="removeWhislist({{ $data->id }})"><i class="bi bi-star-fill fs-6"></i></button>
                                        @endif
                                    </div>
                                </form>
                            </div>
                            @endauth
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <div class="container d-flex align-items-end justify-content-center" style="height: 40vh">
                <h5 class="text-secondary">not found | 404</h5>
            </div>
        @endif
    </div>
</div>

<script>
    function store(button) {
        var form = $(button).closest('form');
        var kuantitas = form.find("input[name='kuantitas']").val();
        var produk_id = form.find("input[name='produk_id']").val();
        var user_id = form.find("input[name='user_id']").val();
        var date = form.find("input[name='date']").val();
        var status = form.find("input[name='status']").val();

        $.ajax({
            type: "POST",
            url: "/store", 
            data: {
                _token: "{{ csrf_token() }}",
                kuantitas: kuantitas,
                produk_id: produk_id,
                user_id: user_id,
                date: date,
                status: status
            },
            success: function (response) {
                updateCartBadgeOnChange();
            },
            error: function (error) {
                console.log(error);
            }
        });
    }

    function addWhislist(prdId){
        $.ajax({
            type: "POST",
            url: "/favorit-add",
            data: {
                 _token: "{{ csrf_token() }}",
                prdId: prdId
            },
            success: function(response){
                // $('#starBtn-' + prdId).prop('disabled', true);
                $('#starBtn-' + prdId).hide();
                $('#unstarBtn-' + prdId).show();
            },
            error: function(error){
                console.error(error);
            }
        });
    }

    function removeWhislist(prdId){
        $.ajax({
            type: "POST",
            url: "/favorit-delete/" + prdId,
            data: {
                 _token: "{{ csrf_token() }}",
                prdId: prdId
            },
            success: function(response){
                // $('#unstarBtn-' + prdId).prop('disabled', true);
                $('#unstarBtn-' + prdId).hide();
                $('#starBtn-' + prdId).show();
            },
            error: function(error){
                console.error(error);
            }
        });
    }
</script>

@include('partials.perenggang')
@endsection
