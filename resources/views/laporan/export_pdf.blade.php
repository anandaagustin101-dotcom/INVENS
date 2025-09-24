<!DOCTYPE html>
<html>
<head>
    <title>Laporan Barang</title>
    <style>
        body { font-family: sans-serif; font-size: 12px; }
        table { width:100%; border-collapse: collapse; margin-bottom: 15px; }
        th, td { border:1px solid #000; padding:5px; text-align:left; }
        th { background:#f2f2f2; }
        h3, h4 { margin: 10px 0 5px; }
    </style>
</head>
<body>
    <h3>Laporan Barang</h3>

    <!-- Stok Barang -->
    <h4>Stok Barang</h4>
    <table>
        <thead>
            <tr><th>Nama</th><th>Kode</th><th>Jumlah</th></tr>
        </thead>
        <tbody>
            @foreach($stok as $item)
            <tr>
                <td>{{ $item->nama }}</td>
                <td>{{ $item->kode }}</td>
                <td>{{ $item->jumlah }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Barang Masuk -->
    <h4>Barang Masuk</h4>
    <table>
        <thead>
            <tr><th>Tanggal</th><th>Nama</th><th>Kode</th><th>Jumlah</th></tr>
        </thead>
        <tbody>
            @foreach($masuk as $item)
            <tr>
                <td>{{ $item->tanggal_masuk }}</td>
                <td>{{ $item->databarang->nama ?? '-' }}</td>
                <td>{{ $item->databarang->kode ?? '-' }}</td>
                <td>{{ $item->jumlah }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Barang Keluar -->
    <h4>Barang Keluar</h4>
    <table>
        <thead>
            <tr><th>Tanggal</th><th>Nama</th><th>Kode</th><th>Jumlah</th></tr>
        </thead>
        <tbody>
            @foreach($keluar as $item)
            <tr>
                <td>{{ $item->tanggal_keluar }}</td>
                <td>{{ $item->databarang->nama ?? '-' }}</td>
                <td>{{ $item->databarang->kode ?? '-' }}</td>
                <td>{{ $item->jumlah }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
