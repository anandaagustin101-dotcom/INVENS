@extends('layouts.app')

@section('content')
<div class="container">
    <h3 class="mb-4">Detail Barang: {{ $barang->nama }}</h3>

    <!-- Info Barang -->
    <div class="card mb-4">
        <div class="card-body">
            <p><strong>Kode:</strong> {{ $barang->kode }}</p>
            <p><strong>Jumlah Stok:</strong> {{ $barang->jumlah }}</p>
            <p><strong>Dibuat:</strong> {{ $barang->created_at->format('d-m-Y') }}</p>
        </div>
    </div>

    <!-- Barang Masuk -->
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

    <!-- Barang Keluar -->
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
