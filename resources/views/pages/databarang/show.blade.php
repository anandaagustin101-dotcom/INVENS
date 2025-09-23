@extends('layouts.app')

@section('title', 'Detail Barang')

@section('content')
<div class="row">
    <div class="col-md-12">
        <h3 class="page-title">Detail Barang</h3>

        <div class="card card-body">
            <table class="table table-striped">
                <tr>
                    <th>ID</th>
                    <td>{{ $databarang->id }}</td>
                </tr>
                <tr>
                    <th>Nama</th>
                    <td>{{ $databarang->nama }}</td>
                </tr>
                <tr>
                    <th>Kode</th>
                    <td>{{ $databarang->kode }}</td>
                </tr>
                <tr>
                    <th>Jumlah</th>
                    <td>{{ $databarang->jumlah }}</td>
                </tr>
                <tr>
                    <th>Terdaftar Pada</th>
                    <td>{{ $databarang->created_at->isoFormat('DD MMM Y HH:mm') }}</td>
                </tr>
                <tr>
                    <th>Diperbaharui Pada</th>
                    <td>{{ $databarang->updated_at->isoFormat('DD MMM Y HH:mm') }}</td>
                </tr>
            </table>
        </div>

        {{-- Riwayat Barang Masuk --}}
        <div class="card card-body mt-3">
            <h5>Riwayat Barang Masuk</h5>
            <table class="table table-striped">
                <tr>
                    <th>Tanggal</th>
                    <th>Jumlah</th>
                </tr>
                @forelse ($databarang->barangMasuk as $masuk)
                    <tr>
                        <td>{{ $masuk->created_at->isoFormat('DD MMM Y HH:mm') }}</td>
                        <td>{{ $masuk->jumlah }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="2" class="text-center">Belum ada riwayat barang masuk</td>
                    </tr>
                @endforelse
            </table>
        </div>

        {{-- Riwayat Barang Keluar --}}
        <div class="card card-body mt-3">
            <h5>Riwayat Barang Keluar</h5>
            <table class="table table-striped">
                <tr>
                    <th>Tanggal</th>
                    <th>Jumlah</th>
                </tr>
                @forelse ($databarang->barangKeluar as $keluar)
                    <tr>
                        <td>{{ $keluar->created_at->isoFormat('DD MMM Y HH:mm') }}</td>
                        <td>{{ $keluar->jumlah }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="2" class="text-center">Belum ada riwayat barang keluar</td>
                    </tr>
                @endforelse
            </table>
        </div>

        <div class="d-flex gap-2 mt-3">
            <a href="{{ route('databarang.index') }}" class="btn btn-secondary">Kembali</a>
            <a href="{{ route('databarang.edit', $databarang->id) }}" class="btn btn-primary">Edit</a>
        </div>
    </div>
</div>
@endsection
