<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataBarang;
use App\Models\BarangMasuk;
use App\Models\BarangKeluar;

class DatabarangController extends Controller
{
    public function index()
    {
        $databarang = DataBarang::orderBy('nama')->get();
        return view('pages.databarang.index', compact('databarang'));
    }

    public function create()
    {
        return view('pages.databarang.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama'   => 'required',
            'kode'   => 'required|unique:databarang,kode',
            'jumlah' => 'required|integer|min:0',
        ]);

        DataBarang::create($request->all());

        return redirect()->route('databarang.index')
            ->with('success', 'Data barang berhasil ditambahkan');
    }

    public function show(string $id)
    {
        $databarang = DataBarang::with(['barangMasuk', 'barangKeluar'])->findOrFail($id);
        return view('pages.databarang.show', compact('databarang'));
    }

    public function edit(string $id)
    {
        $databarang = DataBarang::findOrFail($id);
        return view('pages.databarang.edit', compact('databarang'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama'   => 'required',
            'kode'   => 'required|unique:databarang,kode,' . $id,
            'jumlah' => 'required|integer|min:0',
        ]);

        $databarang = DataBarang::findOrFail($id);
        $databarang->update($request->all());

        return redirect()->route('databarang.index')
            ->with('success', 'Data barang berhasil diubah');
    }

    public function destroy(string $id)
    {
        BarangMasuk::where('databarang_id', $id)->delete();

        BarangKeluar::where('databarang_id', $id)->delete();

        $databarang = DataBarang::findOrFail($id);
        $databarang->delete();

        return redirect()->route('databarang.index')
            ->with('success', 'Data barang beserta data masuk dan keluar berhasil dihapus!');
    }
}
