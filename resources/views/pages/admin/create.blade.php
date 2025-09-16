@extends('layouts.app')

@section('title', 'Tambah Admin')

@section('content')
    <div class="row">
        <div class="col-md-6">
            <h3 class="page-title">Tambah Admin</h3>
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.store') }}" method="POST">
                        @csrf

                        {{-- Nama --}}
                        <div class="form-group mb-3">
                            <label for="name" class="form-label">Nama</label>
                            <input type="text"
                                class="form-control @error('name') is-invalid @enderror"
                                id="name" name="name"
                                value="{{ old('name') }}" />
                            @error('name')
                                <div class="invalid-feedback d-block">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        {{-- Email --}}
                        <div class="form-group mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email"
                                class="form-control @error('email') is-invalid @enderror"
                                id="email" name="email"
                                value="{{ old('email') }}" />
                            @error('email')
                                <div class="invalid-feedback d-block">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        {{-- Password --}}
                        <div class="form-group mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password"
                                class="form-control @error('password') is-invalid @enderror"
                                id="password" name="password" />
                            @error('password')
                                <div class="invalid-feedback d-block">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        {{-- Konfirmasi Password --}}
                        <div class="form-group mb-3">
                            <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
                            <input type="password"
                                class="form-control @error('password_confirmation') is-invalid @enderror"
                                id="password_confirmation" name="password_confirmation" />
                            @error('password_confirmation')
                                <div class="invalid-feedback d-block">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        {{-- Tombol Aksi --}}
                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-primary">
                                <span class="ti ti-send me-1"></span>
                                Simpan
                            </button>

                            <a href="{{ route('admin.index') }}" class="btn btn-secondary">
                                Batal
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection