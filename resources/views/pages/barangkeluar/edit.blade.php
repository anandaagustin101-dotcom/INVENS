@extends('layouts.app')

@section('title', 'Ubah Barang Keluar')

@section('content')
<div class="row">
    <div class="col-md-6">
        <h3 class="page-title">Ubah Barang Keluar</h3>
        <div class="card">
            <div class="card-body">

                {{-- Flash message error --}}
                @if(session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif

                {{-- Validasi error --}}
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('barang-keluar.update', $barangkeluar->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    {{-- Pilih Data Barang --}}
                    <div class="form-group mb-3">
                        <label for="databarang_id" class="form-label">Data Barang</label>
                        <select name="databarang_id" id="databarang_id" class="form-control @error('databarang_id') is-invalid @enderror">
                            @foreach ($databarang as $barang)
                                <option value="{{ $barang->id }}" {{ $barang->id == old('databarang_id', $barangkeluar->databarang_id) ? 'selected' : '' }}>
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
                               value="{{ old('jumlah', $barangkeluar->jumlah) }}">
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
                               value="{{ old('tanggal', $barangkeluar->tanggal) }}">
                        @error('tanggal')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Tombol aksi --}}
                    <div class="form-group mt-3 d-flex gap-2">
                        <button type="submit" class="btn btn-primary">
                            <span class="ti ti-send me-1"></span> Simpan
                        </button>
                        <a href="{{ route('barang-keluar.index') }}" class="btn btn-secondary">Batal</a>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection
