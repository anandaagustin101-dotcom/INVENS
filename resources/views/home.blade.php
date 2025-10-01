@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="container">
    {{-- Kotak Ringkasan --}}
    <div class="row mb-4">
        <div class="col-md-4">
            <div class="card text-center shadow-sm card-hover" style="background-color: #9CCDf4; color: #fff; min-height: 100px;">
                <div class="card-body p-3">
                    <i class="ti ti-package" style="font-size: 1.5rem;"></i>
                    <h6 class="mt-2 mb-1">Data Barang</h6>
                    <h4 class="mb-0">{{ $totalBarang }}</h4>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-center shadow-sm card-hover" style="background-color: #9CCDf4; color: #fff; min-height: 100px;">
                <div class="card-body p-3">
                    <i class="ti ti-package-import" style="font-size: 1.5rem;"></i>
                    <h6 class="mt-2 mb-1">Barang Masuk</h6>
                    <h4 class="mb-0">{{ $totalBarangMasuk }}</h4>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-center shadow-sm card-hover" style="background-color: #9CCDf4; color: #fff; min-height: 100px;">
                <div class="card-body p-3">
                    <i class="ti ti-package-export" style="font-size: 1.5rem;"></i>
                    <h6 class="mt-2 mb-1">Barang Keluar</h6>
                    <h4 class="mb-0">{{ $totalBarangKeluar }}</h4>
                </div>
            </div>
        </div>
    </div>

    {{-- Barang Hampir Habis --}}
    <div class="card shadow-sm mt-4 mb-4" style="background-color: #f8d7da; border-left: 5px solid #f5c2c7;">
        <div class="card-header" style="background-color: #f5c2c7; color: #842029; font-weight: bold;">
            Barang Hampir Habis
        </div>
        <div class="card-body">
            @if($barangHampirHabis->isEmpty())
                <p class="text-dark mb-0">Semua stok masih aman ✅</p>
            @else
                <ul class="list-group">
                    @foreach($barangHampirHabis as $barang)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            {{ $barang->nama }} (Sisa : {{ $barang->jumlah }})
                            <span class="badge bg-danger">{{ $barang->jumlah }}</span>
                        </li>
                    @endforeach
                </ul>
            @endif
        </div>
    </div>

    {{-- Grafik --}}
    <div class="card shadow-sm" style="background-color: #ffffff; color: #BBDEFB ;">
        <div class="card-header" style="background-color: #BBDEFB; color: #0e0c0cff;">
            Grafik Stok Barang
        </div>
        <div class="card-body text-center">
            <canvas id="chart"></canvas>
        </div>
    </div>
</div>

<style>
    #chart {
        max-width: 600px;
        max-height: 350px;
        width: 100%;
        height: auto;
        margin: 0 auto;
    }
</style>
@endsection

@push('scripts')
<script src="{{ asset('/vendor/libs/chartjs/chartjs.js') }}"></script>
<script type="text/javascript">
    var ctx = document.getElementById('chart').getContext('2d');
    var chart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: @json($labels),
            datasets: [{
                label: 'Jumlah Barang',
                data: @json($data),
                backgroundColor: [
                    '#FCDEE2', 
                    '#DBE5EF', 
                    '#FFE5E0', 
                    '#F0F3FA', 
                    '#E8C3D3', 
                    '#F1d8dd', 
                ],
                borderColor: 'rgba(255, 255, 255, 1)',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: true,
                    position: 'top',
                    labels: {
                        color: '#000000d3'
                    }
                }
            },
            scales: {
                x: {
                    ticks: {
                        color: '#000000ff'
                    },
                    grid: {
                        color: 'rgba(90, 62, 43, 0.1)'
                    }
                },
                y: {
                    beginAtZero: true,
                    ticks: {
                        precision: 0,
                        color: '#050403ff'
                    },
                    grid: {
                        color: 'rgba(90, 62, 43, 0.1)'
                    }
                }
            }
        }
    });
</script>
@endpush
