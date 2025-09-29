@extends('layouts.app')

@section('content')
<style>
    .card {
        background-color: #f0f8ff !important; 
        border-radius: 10px;
        padding: 20px;
        box-shadow: 0px 4px 8px rgba(0,0,0,0.1);
    }

    .container {
        max-width: 1200px; 
    }

    table thead {
        background-color: #a2d2ff;
        color: #fff;
        text-align: center;
    }

    table tbody tr:nth-child(even) {
        background-color: #e6f0ff;
    }
    table tbody tr:nth-child(odd) {
        background-color: #ffffff;
    }
    table td {
        text-align: center;
    }
</style>

    <div class="container">
    <h3 class="text-center">LAPORAN STOK & PERGERAKAN BARANG</h3>

    <div class="mt-3 mb-4">
    <form action="{{ route('laporan.export.pdf') }}" method="GET" class="row g-2">
        
        <div class="col-md-3">
           <select name="filter" class="form-select w-auto d-inline-block">
                <option value="">-- Pilih Filter --</option>
                <option value="hari">Per Hari</option>
                <option value="bulan">Per Bulan</option>
                <option value="tahun">Per Tahun</option>
            </select>
        </div>

        <div class="col-md-3" id="tanggalInput" style="display: none;">
            <input type="date" name="tanggal" class="form-control">
        </div>

        <div class="col-md-3" id="bulanInput" style="display: none;">
            <input type="month" name="bulan" class="form-control">
        </div>

        <div class="col-md-3" id="tahunInput" style="display: none;">
            <input type="number" name="tahun" class="form-control" placeholder="Contoh: 2025">
        </div>

        <div class="col-md-2">
            <button type="submit" class="btn btn-danger w-100">Export PDF</button>
        </div>
    </form>
</div>

    @if($barangHampirHabis->count() > 0)
        <div class="alert alert-warning">
            ⚠ <b>Barang Hampir Habis</b><br>
            @foreach($barangHampirHabis as $bh)
                Barang <b>{{ $bh->nama }}</b> stok tinggal <b>{{ $bh->jumlah }}</b> <br>
            @endforeach
        </div>
    @endif

    <!-- Stok Barang -->
    <h5>Stok Barang</h5>
    <div class="card mb-5">
        <table class="table">
            <thead>
                <tr>
                    <th><b>Nama</b></th>
                    <th><b>Kode</b></th>
                    <th><b>Jumlah</b></th>
                </tr>
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
    </div>

    <!-- Barang Masuk -->
    <h5>Barang Masuk</h5>
    <div class="card mb-5">
        <table class="table">
            <thead>
                <tr>
                    <th><b>Tanggal</b></th>
                    <th><b>Nama</b></th>
                    <th><b>Kode</b></th>
                    <th><b>Jumlah</b></th>
                </tr>
            </thead>
            <tbody>
                @foreach($masuk as $item)
                <tr>
                    <td>{{ $item->tanggal }}</td>
                    <td>{{ $item->databarang->nama ?? '-' }}</td>
                    <td>{{ $item->databarang->kode ?? '-' }}</td>
                    <td>{{ $item->jumlah }}</td>
                </tr>
                @endforeach
            </tbody>
        </table> 
    </div>

    <!-- Barang Keluar -->
    <h5>Barang Keluar</h5>
    <div class="card mb-5">
        <table class="table">
            <thead>
                <tr>
                    <th><b>Tanggal</b></th>
                    <th><b>Nama</b></th>
                    <th><b>Kode</b></th>
                    <th><b>Jumlah</b></th>
                </tr>
            </thead>
            <tbody>
                @foreach($keluar as $item)
                <tr>
                    <td>{{ $item->tanggal }}</td>
                    <td>{{ $item->databarang->nama ?? '-' }}</td>
                    <td>{{ $item->databarang->kode ?? '-' }}</td>
                    <td>{{ $item->jumlah }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
