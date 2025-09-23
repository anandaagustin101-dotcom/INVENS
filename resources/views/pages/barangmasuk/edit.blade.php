@extends('layouts.app')

@section('title', 'Ubah Barang Masuk')

@section('content')
<div class="row">
    <div class="col-md-6">
        <h3 class="page-title">Ubah Barang Masuk</h3>
        <div class="card">
            <div class="card-body">
                {{-- Tampilkan error validasi --}}
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('barang-masuk.update', $barangmasuk->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    {{-- Pilih Data Barang --}}
                    <div class="form-group mb-3">
                        <label for="databarang_id" class="form-label">Data Barang</label>
                        <select name="databarang_id" id="databarang_id" class="form-control @error('databarang_id') is-invalid @enderror">
                            @foreach ($databarang as $barang)
                                <option value="{{ $barang->id }}" {{ $barang->id == old('databarang_id', $barangmasuk->databarang_id) ? 'selected' : '' }}>
                                    {{ $barang->nama }} ({{ $barang->kode }})
                                </option>
                            @endforeach
                        </select>
                        @error('databarang_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Jumlah --}}
                    <div class="form-group mb-3">
                        <label for="jumlah" class="form-label">Jumlah</label>
                        <input type="number" 
                               id="jumlah" 
                               name="jumlah" 
                               class="form-control @error('jumlah') is-invalid @enderror"
                               value="{{ old('jumlah', $barangmasuk->jumlah) }}">
                        @error('jumlah')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Tanggal --}}
                    <div class="form-group mb-3">
                        <label for="tanggal" class="form-label">Tanggal</label>
                        <input type="date"
                               id="tanggal"
                               name="tanggal"
                               class="form-control @error('tanggal') is-invalid @enderror"
                               value="{{ old('tanggal', $barangmasuk->tanggal) }}">
                        @error('tanggal')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Tombol aksi --}}
                    <div class="form-group mt-3">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{ route('barang-masuk.index') }}" class="btn btn-secondary">Batal</a>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection
