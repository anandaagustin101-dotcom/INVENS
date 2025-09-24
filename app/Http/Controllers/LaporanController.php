<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataBarang;
use App\Models\BarangMasuk;
use App\Models\BarangKeluar;
use App\Models\Laporan;
use PDF;

class LaporanController extends Controller
{
    public function index()
    {
        $stok   = DataBarang::all();
        $masuk  = BarangMasuk::with('databarang')->get();
        $keluar = BarangKeluar::with('databarang')->get();

        return view('laporan.index', compact('stok','masuk','keluar'));
    }

    public function exportPdf()
    {
        $stok   = DataBarang::all();
        $masuk  = BarangMasuk::with('databarang')->get();
        $keluar = BarangKeluar::with('databarang')->get();

        $pdf = PDF::loadView('laporan.export_pdf', compact('stok','masuk','keluar'));
        return $pdf->download('laporan.pdf');
    }
}
