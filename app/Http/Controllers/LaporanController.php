<?php

namespace App\Http\Controllers;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use App\Models\DataBarang;
use App\Models\BarangMasuk;
use App\Models\BarangKeluar;

class LaporanController extends Controller
{
    public function index()
    {
        $stok   = DataBarang::all();
        $masuk  = BarangMasuk::with('databarang')->get();
        $keluar = BarangKeluar::with('databarang')->get();

        $barangHampirHabis = DataBarang::where('jumlah', '<=', 5)->get();

        return view('laporan.index', compact('stok','masuk','keluar','barangHampirHabis'));
    }

    public function exportPdf(Request $request)
    {
        
        $filter  = $request->input('filter'); 
        $tanggal = $request->input('tanggal'); 
        $bulan   = $request->input('bulan');   
        $tahun   = $request->input('tahun');   

        $stok   = DataBarang::all();
        $masuk  = BarangMasuk::with('databarang');
        $keluar = BarangKeluar::with('databarang');

        if ($filter == 'hari' && $tanggal) {
            $masuk  = $masuk->whereDate('created_at', $tanggal);
            $keluar = $keluar->whereDate('created_at', $tanggal);
        }

        if ($filter == 'bulan' && $bulan) {
            $masuk  = $masuk->whereMonth('created_at', date('m', strtotime($bulan)))
                            ->whereYear('created_at', date('Y', strtotime($bulan)));
            $keluar = $keluar->whereMonth('created_at', date('m', strtotime($bulan)))
                             ->whereYear('created_at', date('Y', strtotime($bulan)));
        }

        if ($filter == 'tahun' && $tahun) {
            $masuk  = $masuk->whereYear('created_at', $tahun);
            $keluar = $keluar->whereYear('created_at', $tahun);
        }

        $masuk  = $masuk->get();
        $keluar = $keluar->get();

        $barangHampirHabis = DataBarang::where('jumlah', '<=', 5)->get();

        $judulLaporan = "Laporan Barang";
        if ($filter == 'hari' && $tanggal) {
            $judulLaporan .= " Tanggal " . date('d-m-Y', strtotime($tanggal));
        } elseif ($filter == 'bulan' && $bulan) {
            $judulLaporan .= " Bulan " . date('F Y', strtotime($bulan));
        } elseif ($filter == 'tahun' && $tahun) {
            $judulLaporan .= " Tahun " . $tahun;
        } else {
            $judulLaporan .= " (Semua Data)";
        }

        $pdf = PDF::loadView('laporan.export_pdf', compact(
            'stok','masuk','keluar','barangHampirHabis','judulLaporan'
        ));

        return $pdf->download('laporan.pdf');
    }
}
