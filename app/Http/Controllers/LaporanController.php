<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use App\Models\DataBarang;
use App\Models\BarangMasuk;
use App\Models\BarangKeluar;
use Carbon\Carbon;

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
        $filter  = $request->input('filter');
        $tanggal = $request->input('tanggal');
        $bulan   = $request->input('bulan');
        $tahun   = $request->input('tahun');

        
        Carbon::setLocale('id');
        setlocale(LC_TIME, 'id_ID.UTF-8');

       
        if ($filter == 'tanggal' && $tanggal) {

            $periode = Carbon::parse($tanggal)
                ->translatedFormat('l, d F Y');

        } elseif ($filter == 'bulan' && $bulan && $tahun) {

            $periode = Carbon::parse("$tahun-$bulan-01")
                ->translatedFormat('F Y');

        } elseif ($filter == 'tahun' && $tahun) {

            $periode = $tahun;

        } else {
            $periode = '-';
        }



        $query = DataBarang::query();

        if ($filter == 'tanggal' && $tanggal) {
            $query->whereDate('created_at', $tanggal);

        } elseif ($filter == 'bulan' && $bulan && $tahun) {
            $query->whereMonth('created_at', $bulan)
                  ->whereYear('created_at', $tahun);

        } elseif ($filter == 'tahun' && $tahun) {
            $query->whereYear('created_at', $tahun);
        }

        $stok   = $query->get();
        $masuk  = BarangMasuk::whereIn('databarang_id', $stok->pluck('id'))->get();
        $keluar = BarangKeluar::whereIn('databarang_id', $stok->pluck('id'))->get();

        $barangHampirHabis = $stok->where('jumlah', '<=', 5);

        $judulLaporan = "Laporan Inventaris Barang";

        $pdf = Pdf::loadView('laporan.export_pdf', compact(
            'stok',
            'masuk',
            'keluar',
            'barangHampirHabis',
            'judulLaporan',
            'periode'
        ));

        return $pdf->download('laporan.pdf');
    }
}
