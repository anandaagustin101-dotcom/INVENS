<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Databarang;
class DatabarangController extends Controller
{
    public function index()
    {
        $databarang = Databarang::orderBy('nama')->get();
        return view('pages.databarang.index', compact('barang'));
    }

    public function create()
    {
        return view('pages.databarang.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'kode' => 'required|unique:databarang,kode',
            'jumlah' => 'required',
        ]);

        Databarang::create($request->all());
        return redirect()->route('databarang.index')
        ->with('success', 'Data barang berhasil ditambahkan');
    }

    public function show(string $id)
    {
        $databarang = Databarang::findOrFail($id);
        return view('pages.databarang.show', compact('databarang'));
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
