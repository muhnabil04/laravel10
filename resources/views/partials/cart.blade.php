                @if (count($keranjang))
                <div id="cart-content">
                <div class="row">
                @foreach ($keranjang as $data)
                <div class="col-md-6 my-1">
                <div class="h-55 p-2 bg-body-tertiary border rounded-3 d-flex justify-content-evenly">
                    <img class="rounded-3" src="{{ asset('img/sharon-pittaway-KUZnfk-2DSQ-unsplash.jpg') }}" alt=""
                        style="max-height: 8rem">
                    <div class="col ms-3 pt-1 align-items-center lh-base">
                        <div class="lh-1">
                            <p>{{ $data->produk->nama }}</p>
                            <p>{{ $data->produk->berat  }} {{ $data->produk->unit->nama }}</p>
                        </div>
                        <p class="d-inline text-danger">Rp. {{ number_format($data->produk->harga)  }}</p><br>
                        
                        <p class="border d-inline">Jumlah Pesanan : <span id="quantity-{{ $data->produk->id }}"> {{ $data->kuantitas }} </span></p>
                        <div class="d-flex justify-content-start gap-1 mt-2">
                            <form class="kurang">
                                @csrf
                                <button type="button" class="btn btn-warning badge" onclick="decreaseQuantity(this)" data-product-id="{{ $data->produk->id }}" data-quantity="{{ $data->kuantitas }}">-</button>
                            </form>
                            <form class="tambah">
                                @csrf
                                <button type="button" class="btn btn-warning badge" onclick="increaseQuantity(this)" data-product-id="{{ $data->produk->id }}">+</button>
                            </form>
                            <form>
                                <button type="button" class="btn btn-danger badge" onclick="dropProduk('{{ $data->id }}')"><i class="bi bi-trash3-fill"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
                </div>
                @endforeach
                </div>
                </div>
                @else
                <div class="container d-flex align-items-end justify-content-center" style="height: 40vh">
                    <h5 class="text-secondary">the cart is empty</h5>
                </div>
                @endif