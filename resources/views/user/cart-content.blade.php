@if($frakturs->isEmpty())
    <p>Keranjang Anda kosong.</p>
@else
    <table class="table">
        <thead>
            <tr>
                <th>Nama Barang</th>
                <th>Jumlah</th>
                <th>Harga</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
            @foreach($frakturs as $item)
            <tr>
                <td>{{ $item->barang->nama_barang }}</td>
                <td>
                    <input type="number" class="item-quantity" value="{{ $item->quantity }}" min="0" data-id="{{ $item->id }}">
                </td>
                <td>Rp {{ number_format($item->barang->harga_barang, 0, ',', '.') }}</td>
                <td>Rp {{ number_format($item->quantity * $item->barang->harga_barang, 0, ',', '.') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endif

