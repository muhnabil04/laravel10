@extends('layouts.template')

@section('landing')
<div class="container">
      @include('partials.trx')
</div>

<script>
    function tombolBuka(kode_transaksi){
        $.ajax({
            type: "POST",
            url: "/keranjang/unhold",
            data: {
                _token: "{{ csrf_token() }}",
                kode_transaksi: kode_transaksi
            },
            success: function(response){
                $('#trx').html(response.html);
                updateCartBadgeOnChange();
                console.log(kode_transaksi);
            },
            error: function (error){
                console.log(kode_transaksi);
                console.log(error);
            }
        });
    }
</script>
@endsection