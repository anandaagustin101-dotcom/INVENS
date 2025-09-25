@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Laporan</h3>

    <!-- Stok Barang -->
    <h5>Stok Barang</h5>
     <div class="card card-body mb-5">
    <table class="table table-striped">
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
     <div class="card card-body mb-5">
    <table class="table table-striped">
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
     <div class="card card-body mb-5">
    <table class="table table-striped">
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
                <td>{{ $item->tanggal}}</td>
                <td>{{ $item->databarang->nama ?? '-' }}</td>
                <td>{{ $item->databarang->kode ?? '-' }}</td>
                <td>{{ $item->jumlah }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

    <div class="mt-3">
        <a href="{{ route('laporan.export.pdf') }}" class="btn btn-danger">Export PDF</a>
    </div>
</div>
@endsection
