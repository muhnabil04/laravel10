<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    
    <link rel="stylesheet" href="/css/login.css">
    
    <title>fahriMart | {{ $halaman }}</title>

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,400;0,700;1,100;1,400;1,700&display=swap"
      rel="stylesheet"
    />
    <link href='img/cart2.svg' rel='shortcut icon'>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
</head>
<body style="font-family: poppins, sans-serif;">
 {{-- Navbar --}}
  @include('partials.navbar')
  @include('partials.perenggang')
{{-- Navbar --}}


{{-- landing --}}
<section class="" >
    @yield('landing')
</section>
{{-- landing --}}

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

<script>
    function updateCartBadge() {
        $.ajax({
            type: 'GET',
            url: '/keranjang/get-count',
            success: function(response) {
                var cartBadge = $('.cart-badge');
                if (response.count > 0) {
                    cartBadge.text(response.count).show();
                } else {
                    cartBadge.hide();
                }
            },
            error: function(error) {
                console.log(error);
            }
        });
    }

    $(document).ready(function() {
        updateCartBadge();
    });

    // Fungsi ini akan memperbarui cart badge setiap kali ada perubahan pada keranjang, seperti menambah atau mengurangi produk
    function updateCartBadgeOnChange() {
        // Panggil updateCartBadge() setelah perubahan pada keranjang
        // Misalnya, setelah menambah atau mengurangi produk menggunakan AJAX
        updateCartBadge();
    }
</script>

</body>
</html>