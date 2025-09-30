<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use App\Models\DataBarang;
use App\Models\BarangMasuk;
use App\Models\BarangKeluar;

class LaporanController extends Controller
{
    public function index(Request $request)
    {
        $filter  = $request->input('filter'); 
        $tanggal = $request->input('tanggal'); 
        $bulan   = $request->input('bulan');   
        $tahun   = $request->input('tahun');   

        $laporan = DataBarang::query();

        if ($filter == 'tanggal' && $tanggal) {
            $laporan->whereDate('created_at', $tanggal);
        }

        if ($filter == 'bulan' && $bulan) {
            $laporan->whereMonth('created_at', $bulan);
            if ($tahun) {
                $laporan->whereYear('created_at', $tahun);
            }
        }

        if ($filter == 'tahun' && $tahun) {
            $laporan->whereYear('created_at', $tahun);
        }

        $laporan = $laporan->get();

        return view('laporan.index', compact('laporan'));
    }

    public function detail($id)
    {
        $barang = DataBarang::findOrFail($id);
        $barangMasuk = BarangMasuk::where('databarang_id', $id)->get();
        $barangKeluar = BarangKeluar::where('databarang_id', $id)->get();

        return view('laporan.detail', compact('barang', 'barangMasuk', 'barangKeluar'));
    }

        public function exportPdf(Request $request)
    {
        $barangId = $request->barang_id;

        $stok   = DataBarang::where('id', $barangId)->get();
        $masuk  = BarangMasuk::where('databarang_id', $barangId)->get();
        $keluar = BarangKeluar::where('databarang_id', $barangId)->get();

        $barangHampirHabis = DataBarang::where('id', $barangId)
            ->where('jumlah', '<=', 5)
            ->get();

        $judulLaporan = "Laporan Inventaris Barang";

        $pdf = \PDF::loadView('laporan.export_pdf', compact(
            'stok', 'masuk', 'keluar', 'barangHampirHabis', 'judulLaporan'
        ));

        return $pdf->download('laporan.pdf');
    }

}
