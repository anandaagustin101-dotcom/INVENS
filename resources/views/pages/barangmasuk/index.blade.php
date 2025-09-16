@extends('layouts.app')

@section('title', 'Data Barang Masuk')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h3>Data Barang Masuk</h3>

            <div class="card card-body">
                <div class="row">
                    <div class="col-md-5">
                        <form action="" method="GET" class="d-flex align-items-center gap-2">
                        </form>
                    </div>
                </div>

                <table class="table table-striped dataTable mt-3">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama Barang</th>
                            <th scope="col">Kode</th>
                            <th scope="col">Jumlah Masuk</th>
                            <th scope="col">Tanggal Masuk</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($barangmasuk as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->barang->nama }}</td>
                                <td>{{ $item->barang->kode }}</td>
                                <td>{{ $item->jumlah_masuk }}</td>
                                <td>{{ $item->created_at->isoFormat('DD-MM-Y HH:mm') }}</td>
                                <td>
                                    <a href="{{ route('barang-masuk.show', $item->id) }}" class="btn btn-sm btn-secondary">
                                        <span class="ti ti-eye"></span>
                                    </a>

                                    <a href="javascript:;" onclick="actionDelete('{{ route('barang-masuk.destroy', $item->id) }}')" class="btn btn-sm btn-danger">
                                        <span class="ti ti-trash"></span>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <form action="" id="formDelete" method="POST" class="d-none">
        @csrf
        @method('DELETE')
    </form>
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('/vendor/libs/datatables-bs5/datatables.bootstrap5.css') }}">
    <link rel="stylesheet" href="{{ asset('/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css') }}">
@endpush

@push('scripts')
    <script src="{{ asset('/vendor/libs/datatables-bs5/datatables-bootstrap5.js') }}"></script>
    <script type="text/javascript">
        $(function () {
            $('.dataTable').DataTable();
        });

        function actionDelete(url) {
            Swal.fire({
                title: 'Apakah anda yakin?',
                text: "Data akan dihapus!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya, hapus!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $('#formDelete').attr('action', url);
                    $('#formDelete').submit();
                }
            });
        }
    </script>
@endpush
