<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
    <style>
        body { font-family: Arial, sans-serif; }
        table { width: 100%; border-collapse: collapse; margin-bottom: 20px; }
        table, th, td { border: 1px solid black; }
        th, td { padding: 8px; text-align: left; }
        .invoice-header { margin-bottom: 20px; }
    </style>
</head>
<body>
    <div class="invoice-header">
        <h2>Invoice #{{ $invoiceNumber }}</h2>
        <p>Nama: {{ $user->name }}</p>
        <p>Email: {{ $user->email }}</p>
        <p>Tanggal: {{ now()->format('d-m-Y') }}</p>
        <p>Alamat: {{ $alamat }}</p>
        <p>Kode Pos: {{ $kodePos }}</p>
    </div>
    <table>
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
                <td>{{ $item->quantity }}</td>
                <td>Rp {{ number_format($item->barang->harga_barang, 0, ',', '.') }}</td>
                <td>Rp {{ number_format($item->quantity * $item->barang->harga_barang, 0, ',', '.') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <p>Total: Rp {{ number_format($frakturs->sum(function($item) { return $item->quantity * $item->barang->harga_barang; }), 0, ',', '.') }}</p>
</body>
</html>
