<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BarangMasuk;
use App\Models\DataBarang;


class BarangMasukController extends Controller
{
    public function index()
    {
        $barangmasuk = BarangMasuk::with('databarang') // relasi ke DataBarang
            ->when(request('tanggal'), function ($query, $tanggal) {
                $query->whereDate('created_at', $tanggal);
            })
            ->orderBy('created_at', 'desc')
            ->get();

        return view('pages.barangmasuk.index', compact('barangmasuk'));
    }

    public function show(string $id)
    {
        $barangmasuk = BarangMasuk::with('databarang')->findOrFail($id);
        return view('pages.barangmasuk.show', compact('barangmasuk'));
    }

    public function store(Request $request)
{
    $request->validate([
        'nama'   => 'required',
        'kode'   => 'required|unique:data_barang,kode',
        'jumlah' => 'required|integer|min:1',
    ]);

    // Simpan ke tabel data_barang
    $barang = DataBarang::create([
        'nama'   => $request->nama,
        'kode'   => $request->kode,
        'jumlah' => $request->jumlah,
    ]);

    // Copy persis ke tabel barang_masuk
    BarangMasuk::create([
        'nama'   => $barang->nama,
        'kode'   => $barang->kode,
        'jumlah' => $barang->jumlah,
        'tanggal'=> now(),
    ]);

    return redirect()->route('barangmasuk.index')
        ->with('success', 'Barang berhasil ditambahkan ke DataBarang & BarangMasuk.');
}


}