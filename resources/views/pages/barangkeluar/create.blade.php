@extends('layouts.app')

@section('title', 'Tambah Barang')

@section('content')
    <div class="row">
        <div class="col-md-6">
            <h3 class="page-title">Tambah Barang</h3>
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('barang-keluar.store') }}" method="POST">
                        @csrf

                         
                       <div class="form-group mb-3">
                    <label for="databarang_id" class="form-label">Data Barang</label>
                    <select name="databarang_id" id="databarang_id" class="form-select">
                        <option value="">Pilih Barang</option>
                        @foreach ($databarang as $databarang)
                        <option value="{{ $databarang->id }}">{{ $databarang->nama }}</option>
                        @endforeach
                    </select>

                    @error('databarang_id')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>


                        {{-- Jumlah --}}
                        <div class="form-group mb-3">
                            <label for="jumlah" class="form-label">Jumlah</label>
                            <input type="smallInteger"
                                class="form-control @error('jumlah') is-invalid @enderror"
                                id="jumlah" name="jumlah"
                                value="{{ old('jumlah') }}" />
                            @error('jumlah')
                                <div class="invalid-feedback d-block">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        
                    <div class="form-group md-3">
                    <label for="tanggal" class="form-label">Tanggal</label>
                    <input type="date" name="tanggal" id="tanggal" class="form-control" />
                    @error('tanggal')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                       
                        {{-- Tombol Aksi --}}
                        <div class="flex ">
                            <button type="submit" class="btn btn-primary">
                                <span class="ti ti-send me-1"></span>
                                Simpan
                            </button>

                            <a href="{{ route('barang-keluar.index') }}" class="btn btn-secondary">
                                Batal
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection