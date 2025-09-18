<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataBarang;

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
            'nama' => 'required',
            'kode' => 'required|unique:barang,kode',
            'jumlah' => 'required',
        ]);

        DataBarang::create($request->all());
        return redirect()->route('databarang.index')
        ->with('success', 'Data barang berhasil ditambahkan');

         BarangMasuk::create($request->all());
        return redirect()->route('barang-masuk.index')
        ->with('success', 'Data barang masuk berhasil ditambahkan');
    }

    public function show(string $id)
    {
        $databarang = DataBarang::findOrFail($id);
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
            'nama' => 'required',
            'kode' => 'required|unique:databarang,kode,' . $id,
            'jumlah' => 'required',
        ]);

        $databarang = DataBarang::findOrFail($id);
        $databarang->update($request->all());
        return redirect()->route('databarang.index')
        ->with('success', 'Data barang berhasil diubah');
    }

    public function destroy(string $id)
    {
        $databarang = DataBarang::findOrFail($id);
        $databarang->delete();
        return redirect()->route('databarang.index')
        ->with('succes', 'Data barang berhasil dihapus');
    }
}
