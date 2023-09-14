<div id="favorit-content">
    @if (count($whislist))
    <table class="table border-bottom mt-5 mx-100">
        <thead>
            <th></th>
            <th class="text-center">Nama Produk</th>
            <th class="text-center">Harga Produk</th>
            <th></th>
        </thead>
        <tbody class="">
            @foreach ($whislist as $item)
            <tr class="align-items-center">
                <td class="col-sm-2 align-middle"> 
                    <div class="d-flex align-items-center">
                        <img src="{{ asset('img/sharon-pittaway-KUZnfk-2DSQ-unsplash.jpg') }}" alt="" style="width: 90px" class="me-3"> 
                            <form>
                                <div class="d-flex align-items-center justify-content-center" style="height: 100%;">
                                    <button type="button" class="btn btn-danger" onclick="hapusFaforit({{ $item->produk->id }})"><i class="bi bi-trash3-fill fs-4"></i></button>
                                </div>
                            </form>
                    </div>
                </td> 
                <td class="text-center align-middle">{{ $item->produk->nama }}</td>
                <td class="text-center align-middle">Rp. {{ number_format($item->produk->harga) }}</td>
                <td class="text-center align-middle"> 
                    <form class="add-to-cart-form">
                        @csrf
                        <input type="hidden" name="kuantitas" value="1">
                        <input type="hidden" name="produk_id" value="{{ $item->produk->id }}">
                        <button type="button" class="btn btn-success"onclick="store(this)">add to cart</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <div class="container d-flex align-items-center justify-content-center" style="min-height: 80vh">
        <h5 class="text-secondary">There are no items.</h5>
    </div>
    @endif
</div>

