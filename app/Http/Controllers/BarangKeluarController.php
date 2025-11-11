<?php

namespace App\Http\Controllers; 

use App\Models\BarangKeluar;
use App\Models\Databarang;
use Illuminate\Http\Request;

class BarangKeluarController extends Controller
{
    public function index()
    {
        $barangkeluar = BarangKeluar::with('databarang')->orderBy('created_at', 'desc')->get();
        return view('pages.barangkeluar.index', compact('barangkeluar'));
    }

    public function create()
    {
        $databarang = Databarang::orderBy('nama', 'asc')->get();
        return view('pages.barangkeluar.create', compact('databarang'));
    }

     public function show($id)
    {
        $barangkeluar = BarangKeluar::with('databarang')->findOrFail($id);
        return view('pages.barangkeluar.show', compact('barangkeluar'));
    }

    public function edit(string $id)
    {
        $barangkeluar = BarangKeluar::findOrFail($id);
        $databarang = Databarang::orderBy('nama', 'asc')->get(); 
        return view('pages.barangkeluar.edit', compact('barangkeluar', 'databarang'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'databarang_id' => 'required', 
            'jumlah' => 'required|integer|min:1',
            'tanggal' => 'required|date',
        ]);

        $barang = Databarang::findOrFail($request->databarang_id);

        if ($barang->jumlah < $request->jumlah) {
            return redirect()->back()->with('error', 'Stok tidak mencukupi!');
        }

        $barangkeluar = BarangKeluar::create($request->all());

        $barang->jumlah -= $request->jumlah;
        $barang->save();

        return redirect()->route('barang-keluar.index')
            ->with('success', 'Barang keluar berhasil ditambahkan dan stok berkurang!');
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'databarang_id' => 'required', 
            'jumlah' => 'required|integer|min:1',
            'tanggal' => 'required|date',
        ]);

        $barangkeluar = BarangKeluar::findOrFail($id);

        $barangLama = Databarang::findOrFail($barangkeluar->databarang_id);
        $barangLama->jumlah += $barangkeluar->jumlah;
        $barangLama->save();

        $barangkeluar->update($request->all());

        $barangBaru = Databarang::findOrFail($request->databarang_id);

        if ($barangBaru->jumlah < $request->jumlah) {
            return redirect()->back()->with('error', 'Stok tidak mencukupi!');
        }

        $barangBaru->jumlah -= $request->jumlah;
        $barangBaru->save();

        return redirect()->route('barang-keluar.index')
            ->with('success', 'Barang keluar berhasil diupdate dan stok otomatis berubah!');
    }

    public function destroy(string $id)
    {
        $barangkeluar = BarangKeluar::findOrFail($id);

        $barang = Databarang::findOrFail($barangkeluar->databarang_id);
        $barang->jumlah += $barangkeluar->jumlah;
        $barang->save();

        $barangkeluar->delete();

        return redirect()->route('barang-keluar.index')
            ->with('success', 'Barang keluar berhasil dihapus dan stok otomatis dikembalikan!');
    }
}
