@extends('layouts.app')

@section('title', 'Detail Barang')

@section('content')
<div class="row">
    <div class="col-md-12">
        <h3 class="page-title">Detail Barang</h3>

        <div class="card card-body">
            <table class="table table-striped">   
     <tr>
            <th width="25%">nama</th>
            <th width="10px">:</th>
            <td>{{ $barangmasuk->nama}}</td>
        </tr>
        <tr>
            <th width="25%">kode</th>
            <th width="10px">:</th>
            <td>{{ $barangmasuk->kode}}</td>
        </tr>
        <tr>
            <th width="25%">jumlah</th>
            <th width="10px">:</th>
            <td>{{ $barangmasuk->jumlah}}</td>
        </tr>
        <tr>
            <th width="25%">tanggal</th>
            <th width="10px">:</th>
            <td>{{ $barangmasuk->tanggal}}</td>
        </tr>
         <tr>
            <th width="25%">databarang_id</th>
            <th width="10px">:</th>
            <td>{{ $barangmasuk->databarang_id}}</td>
        </tr>
        <tr>
            <th width="25%">Terdaftar Pada</th>
            <th width="10px">:</th>
            <td>{{ $barangmasuk->created_at->isoFormat('DD MMM Y HH:mm') }}</td>
        </tr>
        <tr>
            <th width="25%">Diperbaharui Pada</th>
            <th width="10px">:</th>
            <td>{{ $barangmasuk->updated_at->isoFormat('DD MMM Y HH:mm')}}</td>
        </tr>
    </tbody>
</table>
<div class="d-flex gap-2 mt-3">
    <a href="{{ route('barang-masuk.index', $barangmasuk->id) }}" class="btn btn-secondary">
        <span class="ti ti-arrow-left me-1"></span>
            Kembali
        </a>
    <a href="{{ route('barang-masuk.edit', $barangmasuk->id) }}" class="btn btn-primary">
        <span class="ti ti-pencil me-1"></span>
             Edit
        </a>
</div>
</div>
</div>
@endsection