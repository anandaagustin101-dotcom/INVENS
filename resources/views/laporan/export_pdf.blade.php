<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>{{ $judulLaporan }}</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; font-size: 12px; }
        h2 { text-align: center; margin-bottom: 4px; }
        h4 { text-align: center; margin-top: 0; margin-bottom: 20px; }
        table { width: 100%; border-collapse: collapse; margin-bottom: 25px; }
        th, td { border: 1px solid #000; padding: 6px; text-align: center; }
        th { background-color: #f2f2f2; }
        h3 { margin-top: 30px; margin-bottom: 8px; }
    </style>
</head>
<body>

    <h2>{{ $judulLaporan }}</h2>

    
    <h4>Periode: {{ $periode }}</h4>

    
    <h3>Stok Barang</h3>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Barang</th>
                <th>Kode</th>
                <th>Jumlah</th>
            </tr>
        </thead>
        <tbody>
            @foreach($stok as $i => $item)
            <tr>
                <td>{{ $i+1 }}</td>
                <td>{{ $item->nama }}</td>
                <td>{{ $item->kode }}</td>
                <td>{{ $item->jumlah }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    
    <h3>Barang Masuk</h3>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Barang</th>
                <th>Jumlah</th>
                <th>Tanggal Masuk</th>
            </tr>
        </thead>
        <tbody>
            @foreach($masuk as $i => $item)
            <tr>
                <td>{{ $i+1 }}</td>
                <td>{{ $item->dataBarang->nama ?? '-' }}</td>
                <td>{{ $item->jumlah }}</td>
                <td>{{ \Carbon\Carbon::parse($item->created_at)->format('d-m-Y') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    
    <h3>Barang Keluar</h3>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Barang</th>
                <th>Jumlah</th>
                <th>Tanggal Keluar</th>
            </tr>
        </thead>
        <tbody>
            @foreach($keluar as $i => $item)
            <tr>
                <td>{{ $i+1 }}</td>
                <td>{{ $item->dataBarang->nama ?? '-' }}</td>
                <td>{{ $item->jumlah }}</td>
                <td>{{ \Carbon\Carbon::parse($item->created_at)->format('d-m-Y') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    
    <h3>Barang Hampir Habis (Stok ≤ 5)</h3>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Barang</th>
                <th>Kode</th>
                <th>Jumlah</th>
            </tr>
        </thead>
        <tbody>
            @forelse($barangHampirHabis as $i => $item)
            <tr>
                <td>{{ $i+1 }}</td>
                <td>{{ $item->nama }}</td>
                <td>{{ $item->kode }}</td>
                <td>{{ $item->jumlah }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="4">Tidak ada barang hampir habis</td>
            </tr>
            @endforelse
        </tbody>
    </table>

</body>
</html>
