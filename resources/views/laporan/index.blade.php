@extends('layouts.app')

@section('title', 'Halaman Laporan')

@section('content')
<div class="container">
    <h3 class="text-center" mb-4>LAPORAN</h3>

    <!-- Filter -->
    <form action="{{ route('laporan.index') }}" method="GET" class="mb-4">
        <div class="row g-2">
            <div class="col-md-3">
                <select name="filter" class="form-select" id="filter">
                    <option value=""class="text-center"> Pilih Opsi </option>
                    <option value="tanggal" {{ request('filter') == 'tanggal' ? 'selected' : '' }}>Per Tanggal</option>
                    <option value="bulan" {{ request('filter') == 'bulan' ? 'selected' : '' }}>Per Bulan</option>
                    <option value="tahun" {{ request('filter') == 'tahun' ? 'selected' : '' }}>Per Tahun</option>
                </select>
            </div>

            <div class="col-md-3" id="tanggalInput" style="display:none;">
                <input type="date" name="tanggal" class="form-control" value="{{ request('tanggal') }}">
            </div>

            <div class="col-md-3" id="bulanInput" style="display:none;">
                <input type="number" name="bulan" class="form-control" min="1" max="12"
                       placeholder="Bulan (1-12)" value="{{ request('bulan') }}">
            </div>

            <div class="col-md-3" id="tahunInput" style="display:none;">
                <input type="number" name="tahun" class="form-control"
                       placeholder="Tahun" value="{{ request('tahun') }}">
            </div>

            <div class="col-md-2">
                <button type="submit" class="btn btn-primary w-100">Terapkan</button>
            </div>
        </div>
    </form>

    <!-- Tabel Data -->
    <div class="card">
        <div class="card-body">
            <table class="table table-bordered text-center align-middle">
                <thead class="table-danger">
                    <tr>
                        <th>No</th>
                        <th>Nama Barang</th>
                        <th>Jumlah</th>
                        <th>Tanggal</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($laporan as $index => $item)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $item->nama }}</td>
                            <td>{{ $item->jumlah }}</td>
                            <td>{{ \Carbon\Carbon::parse($item->created_at)->format('d-m-Y') }}</td>
                            <td>
                                <a href="{{ route('laporan.detail', $item->id) }}" class="btn btn-info btn-sm">
                                    Detail
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5">Tidak ada data</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Tombol Export -->
    <div class="mt-4 text-start">
        <a href="{{ route('laporan.export.pdf', request()->all()) }}" class="btn btn-danger">
            Export PDF
        </a>
    </div>
</div>

<script>
    function showFilterInputs() {
        let filter = document.getElementById('filter').value;
        document.getElementById('tanggalInput').style.display = 'none';
        document.getElementById('bulanInput').style.display = 'none';
        document.getElementById('tahunInput').style.display = 'none';

        if (filter === 'tanggal') {
            document.getElementById('tanggalInput').style.display = 'block';
        } else if (filter === 'bulan') {
            document.getElementById('bulanInput').style.display = 'block';
            document.getElementById('tahunInput').style.display = 'block';
        } else if (filter === 'tahun') {
            document.getElementById('tahunInput').style.display = 'block';
        }
    }

    document.getElementById('filter').addEventListener('change', showFilterInputs);
    showFilterInputs();
</script>
@endsection
