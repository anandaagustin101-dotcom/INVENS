@extends('layouts.app')

@section('title', 'Detail Barang')

@section('content')
<div class="container">
    <h3 class="text-center" mb-4>Detail Barang : {{ $barang->nama }}</h3>

     <div class="row">
        <div class="col-md-12">
        <div class="card mb-4">
        <div class="card card-body ">
            <table class="table table-striped">
                <tr>
                    <th>Kode:</th> 
                    <td>{{ $barang->kode }}</td>
                </tr>
                <tr>
                    <th>Jumlah Stok:</th>
                    <td>{{ $barang->jumlah }}</td>
                </tr>
                <tr>
                     <th>Dibuat:</th>
                     <td>{{ $barang->created_at->format('d-m-Y') }}</td>
                </tr>
            </table>
        </div>
    </div>
    </div>
    </div>

    <div class="card mb-4">
        <div class="card-header bg-success text-white">Barang Masuk</div>
        <div class="card-body">
            <table class="table table-bordered text-center">
                <thead class="table-success">
                    <tr>
                        <th>No</th>
                        <th>Jumlah</th>
                        <th>Tanggal Masuk</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($barangMasuk as $i => $masuk)
                        <tr>
                            <td>{{ $i+1 }}</td>
                            <td>{{ $masuk->jumlah }}</td>
                            <td>{{ \Carbon\Carbon::parse($masuk->tanggal)->format('d-m-Y') }}</td>
                        </tr>
                    @empty
                        <tr><td colspan="3">Tidak ada data</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="card mb-4">
        <div class="card-header bg-danger text-white">Barang Keluar</div>
        <div class="card-body">
            <table class="table table-bordered text-center">
                <thead class="table-danger">
                    <tr>
                        <th>No</th>
                        <th>Jumlah</th>
                        <th>Tanggal Keluar</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($barangKeluar as $i => $keluar)
                        <tr>
                            <td>{{ $i+1 }}</td>
                            <td>{{ $keluar->jumlah }}</td>
                            <td>{{ \Carbon\Carbon::parse($keluar->tanggal)->format('d-m-Y') }}</td>
                        </tr>
                    @empty
                        <tr><td colspan="3">Tidak ada data</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <a href="{{ route('laporan.index') }}" class="btn btn-secondary">Kembali</a>
</div>

@endsection


