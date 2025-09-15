<?php

namespace App\Http\Controllers;
use App\Models\BarangMasuk;
use Illuminate\Http\Request;

class BarangMasukController extends Controller
{
    public function index()
    {
        $barangmasuk = BarangMasuk::orderBy('nama')->get();
        return view('pages.barangmasuk.index', compact('barangmasuk'));
    }

    public function create()
    {
        return view('pages.baranngmasuk.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'kode' => 'required|unique:databarang,kode',
            'jumlah' => 'required',
        ]);

        BarangMasuk::create($request->all());
        return redirect()->route('barangmasuk.index')
        ->with('success', 'Data barang berhasil ditambahkan');
    }

    public function show(string $id)
    {
        $barangmasuk = BarangMasuk::findOrFail($id);
        return view('pages.barangmasuk.show', compact('databarang'));
    }

    public function edit(string $id)
    {
        $databarang = Databarang::findOrFail($id);
        return view('pages.databarang.edit', compact('databarang'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama' => 'required',
            'kode' => 'required|unique:databarang,kode',
            'jumlah' => 'required',
        ]);

        $databarang = Databarang::findOrFail($id);
        $databarang->update($request->all());
        return redirect()->route('databarang.index')
        ->with('success', 'Data barang berhasil diubah');
    }

    public function destroy(string $id)
    {
        $databarang = Databarang::findOrFail($id);
        $databarang->delete();
        return redirect()->route('databarang.index')
        ->with('succes', 'Data barang berhasil dihapus');
    }
}
