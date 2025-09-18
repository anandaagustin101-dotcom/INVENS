@extends('layouts.app')

@section('title', 'Ubah Barang')

@section('content')
    <div class="row">
        <div class="col-md-6">
            <h3 class="page-title">Ubah Barang</h3>
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('databarang.update', $databarang->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                          {{-- Nama --}}
                        <div class="form-group mb-3">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text"
                                class="form-control @error('nama') is-invalid @enderror"
                                id="nama" name="nama"
                                value="{{ old('name') ?? $databarang->nama}}" />
                            @error('nama')
                                <div class="invalid-feedback d-block">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        
                        {{-- Kode --}}
                        <div class="form-group mb-3">
                            <label for="kode" class="form-label">Kode</label>
                            <input type="text"
                                class="form-control @error('kode') is-invalid @enderror"
                                id="kode" name="kode"
                                value="{{ old('kode') ?? $databarang->kode}}" />
                            @error('kode')
                                <div class="invalid-feedback d-block">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        {{-- Jumlah --}}
                        <div class="form-group mb-3">
                            <label for="jumlah" class="form-label">Jumlah</label>
                            <input type="smallint"
                                class="form-control @error('jumlah') is-invalid @enderror"
                                id="jumlah" name="jumlah"
                                value="{{ old('jumlah') ?? $databarang->jumlah}}" />
                            @error('jumlah')
                                <div class="invalid-feedback d-block">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                       
                        {{-- Tombol Aksi --}}
                        <div class="flex ">
                            <button type="submit" class="btn btn-primary">
                                <span class="ti ti-send me-1"></span>
                                Simpan
                            </button>

                            <a href="{{ route('databarang.index') }}" class="btn btn-secondary">
                                Batal
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection