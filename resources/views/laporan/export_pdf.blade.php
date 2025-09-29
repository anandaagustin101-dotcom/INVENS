<!DOCTYPE html>
<html>
<head>
    <title>Laporan Barang</title>
    <style>
        body { font-family: sans-serif; font-size: 12px; }
        table { width:100%; border-collapse: collapse; margin-bottom: 15px; }
        th, td { border:1px solid #000; padding:5px; }
        th { background:#f2f2f2; font-weight: bold; text-align: center; }
        h2, h3, h4 { margin: 10px 0 5px; }

        .center { text-align: center; }
    </style>
</head>
<body>

    <h2 style="text-align:center; margin-bottom:20px;">LAPORAN BARANG</h2>

    <h4>Stok Barang</h4>
    <table>
        <thead>
            <tr>
                <th class="center">Nama</th>
                <th class="center">Kode</th>
                <th class="center">Jumlah</th>
            </tr>
        </thead>
        <tbody>
            @foreach($stok as $item)
            <tr>
                <td class="center">{{ $item->nama }}</td>
                <td class="center">{{ $item->kode }}</td>
                <td class="center">{{ $item->jumlah }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <h4>Barang Masuk</h4>
    <table>
        <thead>
            <tr>
                <th class="center">Tanggal</th>
                <th class="center">Nama</th>
                <th class="center">Kode</th>
                <th class="center">Jumlah</th>
            </tr>
        </thead>
        <tbody>
            @foreach($masuk as $item)
            <tr>
                <td class="center">{{ $item->created_at->format('d-m-Y') }}</td>
                <td class="center">{{ $item->databarang->nama ?? '-' }}</td>
                <td class="center">{{ $item->databarang->kode ?? '-' }}</td>
                <td class="center">{{ $item->jumlah }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <h4>Barang Keluar</h4>
    <table>
        <thead>
            <tr>
                <th class="center">Tanggal</th>
                <th class="center">Nama</th>
                <th class="center">Kode</th>
                <th class="center">Jumlah</th>
            </tr>
        </thead>
        <tbody>
            @foreach($keluar as $item)
            <tr>
                <td class="center">{{ $item->created_at->format('d-m-Y') }}</td>
                <td class="center">{{ $item->databarang->nama ?? '-' }}</td>
                <td class="center">{{ $item->databarang->kode ?? '-' }}</td>
                <td class="center">{{ $item->jumlah }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <h4>Rekapitulasi</h4>
    <table>
        <tr>
            <th class="center">Total Stok</th>
            <td class="center">{{ $stok->sum('jumlah') }}</td>
        </tr>
        <tr>
            <th class="center">Total Barang Masuk</th>
            <td class="center">{{ $masuk->sum('jumlah') }}</td>
        </tr>
        <tr>
            <th class="center">Total Barang Keluar</th>
            <td class="center">{{ $keluar->sum('jumlah') }}</td>
        </tr>
    </table>

    <p style="text-align:center; font-size:11px; margin-top:30px;">
        Dicetak pada: {{ now()->format('d-m-Y') }}
    </p>
</body> 
</html>
