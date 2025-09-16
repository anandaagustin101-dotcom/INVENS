@extends('layouts.app')

@section('title', 'Detail Barang Masuk')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h3 class="page-title">Detail Barang Masuk</h3>
            
            <div class="card card-body">
                <table class="table table-striped">
                    <tr>
                        <th width="25%">ID</th>
                        <th width="10px">:</th>
                        <td>{{ $barangmasuk->id }}</td>
                    </tr>

                    <tr>
                        <th>Nama Barang</th>
                        <th>:</th>
                        <td>{{ $barangmasuk->barang->nama }}</td>
                    </tr>

                    <tr>
                        <th>Kode Barang</th>
                        <th>:</th>
                        <td>{{ $barangmasuk->barang->kode }}</td>
                    </tr>

                    <tr>
                        <th>Jumlah Masuk</th>
                        <th>:</th>
                        <td>{{ $barangmasuk->jumlah_masuk }}</td>
                    </tr>

                    <tr>
                        <th>Tanggal Masuk</th>
                        <th>:</th>
                        <td>{{ $barangmasuk->created_at->isoFormat('DD MMM Y HH:mm') }}</td>
                    </tr>
                </table>
            </div>

            <div class="d-flex gap-2 mt-3">
                <a href="{{ route('barang-masuk.index') }}" class="btn btn-secondary">
                    <span class="ti ti-arrow-left me-1"></span>
                    Kembali
                </a>
            </div>
        </div>
    </div>
@endsection
