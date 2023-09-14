@extends('layouts.template')

@section('landing')
<div class="container">
    @include('partials.favorit')
</div>

<script>
       function store(button) {
        var form = $(button).closest('form');
        var kuantitas = form.find("input[name='kuantitas']").val();
        var produk_id = form.find("input[name='produk_id']").val();

        $.ajax({
            type: "POST",
            url: "favorit/store", 
            data: {
                _token: "{{ csrf_token() }}",
                kuantitas: kuantitas,
                produk_id: produk_id
            },
            success: function (response) {
                updateCartBadgeOnChange();
            },
            error: function (error) {
                console.log(error);
            }
        });
    }

    function hapusFaforit(produkID){
        $.ajax({
            type: "POST",
            url: "/favorit-delete/" + produkID,
            data: {
                _token : "{{ csrf_token() }}",
            },
            success: function(response){
                $('#favorit-content').html(response.html)

            },
            error: function(error){

            }

        });
    }

</script>

@endsection
