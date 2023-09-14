@extends('layouts.template')

@section('landing')

<div class="send-email"></div>

<div class="container">
    @if (count($detail))
    <table class="table border mt-5">
        <thead>
            <th>No</th>
            <th>Nama Produk</th>
            <th>Kuantitas</th>
            <th>Harga Produk</th>
            <th>Sub Total</th>
        </thead>
        <tbody>
            @php
            $totalHarga = 0; // Inisialisasi total harga
            @endphp

            @foreach ($detail as $data)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $data->produk->nama }}</td>
                <td>{{ $data->kuantitas }}</td>
                <td>Rp. {{ number_format($data->produk->harga) }}</td>
                <td>Rp. {{ number_format($data->produk->harga * $data->kuantitas) }}</td>
            </tr>

            @php
            $totalHarga += $data->produk->harga * $data->kuantitas;
            @endphp

            @endforeach

            <tr>
                <td colspan="4" class="text-end">Total Harga :</td>
                <td class="text-danger">Rp. {{ number_format($totalHarga) }}</td>
            </tr>
        </tbody>
    </table>
    <div class="text-center mt-3 d-flex justify-content-end gap-3">
        <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#emailModal">
            <i class="bi bi-envelope fs-4"></i>
        </button>
        <a href="/downloadpdf/{{ $detail[0]->transaksi->id }}" class="btn btn-danger">
            <i class="bi fs-4 bi-filetype-pdf"></i>
        </a>
    </div>
    @else
    <div class="container d-flex align-items-center justify-content-center" style="min-height: 40vh">
        <h5 class="text-secondary">There are no items.</h5>
    </div>
    @endif
</div>

<div class="modal fade" id="emailModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Kirim Email</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="emailForm">
                @csrf
                <div class="modal-body">
                <div class="mb-3">
                    <label for="inputMail" class="form-label">Email Tujuan</label>
                    <input type="email" class="form-control" id="inputMail" placeholder="Email Tujuan">
                </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" onclick="(sendEmail())">Kirim</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function sendEmail() {
        var email = $("#inputMail").val();

        $.ajax({
            type: "POST",
            url: "/sendmail/{{ $detail[0]->transaksi->id }}",
            data: {
                _token: "{{ csrf_token() }}",
                email: email
            },
            success: function (response) {
                alert('Email berhasil terkirim!');
                $("#emailModal").modal("hide");
            },
            error: function (error) {
                console.log(error);
                alert('Terjadi kesalahan saat mengirim email. Cobalah refresh halaman');
            }
        });
    }
</script>

@endsection
