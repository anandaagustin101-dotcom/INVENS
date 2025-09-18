@extends('layouts.app')

@section('title', 'Ubah Barang')

@section('content')
<div class="container">
    <h3>Edit Barang</h3>
            <a href="{{ route('barang-masuk.index') }}" class="btn btn-secondary my-3">Kembali</a>

            <div class="row">
            <div class="col-md-6">
            <div class="card card-body">
                <form action="{{ route('barang-masuk.update', $barangmasuk->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group md-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" name="nama" id="nama" class="form-control"
                           value="{{ old('nama', $barangmasuk->nama) }}">
                    @error('nama')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group md-3">
                    <label for="kode" class="form-label">Kode</label>
                    <input name="kode" id="kode" class="form-control" 
                           value="{{ old('kode', $barangmasuk->kode) }}">
                    @error('kode')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group md-3">
                    <label for="jumlah" class="form-label">Jumlah</label>
                    <input type="smallInteger" name="jumlah" id="jumlah" class="form-control"
                           value="{{ old('jumlah', $barangmasuk->jumlah) }}">
                    @error('jumlah')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div> 

                <div class="form-group md-3">
                    <label for="tanggal" class="form-label">Tanggal</label>
                    <input type="date" name="tanggal" id="tanggal" class="form-control"
                           value="{{ old('tanggal', $barangmasuk->tanggal) }}">
                    @error('tanggal')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                
                <div class="form-group mb-3">
                    <label for="databarang_id" class="form-label">Data Barang</label>
                    <select name="databarang_id" id="databarang_id" class="form-select">
                        <option value="">Pilih Barang</option>
                        @foreach ($databarang as $databarang)
                        <option value="{{ $databarang->id }}"
                             {{ old('databarang_id', $barangmasuk->databarang_id) == $databarang->id ? 'selected' : '' }}>
                             {{ $databarang->nama }}
                                </option>
                    </select>
                    @error('databarang_id')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                
                <div class="flex">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <button type="submit" class="btn btn-secondary">Reset</button>
                </div>
            </form>
           </div>
        </div>
    </div>
</div>
@endsection