<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataBarang;
use App\Models\BarangMasuk;
use App\Models\BarangKeluar;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        // Ambil label dan data stok barang
        $labels = DataBarang::pluck('nama')->toArray();
        $data   = DataBarang::pluck('jumlah')->toArray();

        // Hitung total untuk kotak ringkasan
        $totalBarang = DataBarang::count();
        $totalBarangMasuk = BarangMasuk::count();
        $totalBarangKeluar = BarangKeluar::count();

        return view('home', compact('labels', 'data', 'totalBarang', 'totalBarangMasuk', 'totalBarangKeluar'));
    }
}
