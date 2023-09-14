  <div id="trx">
    @if (count($keranjang))        
    <table class="table border mt-5">
          <tbody>
          @php
            $displayedKodeTransaksi = [];
          @endphp
          @foreach ($keranjang as $item)
              @if (!in_array($item->kode_transaksi, $displayedKodeTransaksi))
                  @php
                      $displayedKodeTransaksi[] = $item->kode_transaksi;
                  @endphp
                  <tr class="col-sm-2">
                      <td class="d-flex align-items-center">
                          <span class="text-danger">{{ $item->kode_transaksi }}</span>
                          <span class="ms-3">-</span>
                          <form>
                              <button type="button" class="btn text-info border-0" onclick="tombolBuka('{{ $item->kode_transaksi }}')">Buka</button>
                          </form>
                      </td>
                  </tr>
              @endif
          @endforeach
          </tbody>
      </table>
    @else
     <div class="container d-flex align-items-end justify-content-center" style="height: 40vh">
        <h5 class="text-secondary">there is no hold item.</h5>
    </div>
    @endif
    </div>