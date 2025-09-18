@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Tambah Barang Masuk</h3>
    <div class="col-md-12">
        <div class="card card-body">
            <form action="{{ route('barang-masuk.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group md-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" name="nama" id="nama" class="form-control" />
                    @error('nama')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group md-3">
                    <label for="kode" class="form-label">Kode</label>
                    <input name="kode" id="kode" class="form-control" />
                    @error('kode')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group md-3">
                    <label for="jumlah" class="form-label">Jumlah</label>
                    <input type="smallInteger" name="jumlah" id="jumlah" class="form-control" />
                    @error('jumlah')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div> 

                <div class="form-group md-3">
                    <label for="tanggal" class="form-label">Tanggal</label>
                    <input type="date" name="tanggal" id="tanggal" class="form-control" />
                    @error('tanggal')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                
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

                
                <div class="flex">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <a href="{{ route('barang-masuk.index') }}" class="btn btn-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection