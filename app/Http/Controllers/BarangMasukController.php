<?php

namespace App\Http\Controllers;

use App\Models\BarangMasuk;
use App\Models\Databarang;
use Illuminate\Http\Request;

class BarangMasukController extends Controller
{
    public function index()
    {
        $barangmasuk = BarangMasuk::with('databarang')->orderBy('created_at', 'desc')->get();
        return view('pages.barangmasuk.index', compact('barangmasuk'));
    }

    public function create()
    {
        $databarang = Databarang::orderBy('nama', 'asc')->get();
        return view('pages.barangmasuk.create', compact('databarang'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'databarang_id' => 'required|exists:databarang,id',
            'jumlah' => 'required|integer|min:1',
            'tanggal' => 'required|date',
        ]);

        $barangmasuk = BarangMasuk::create($request->all());

        // Tambah stok ke data barang
        $barang = Databarang::findOrFail($request->databarang_id);
        $barang->jumlah += $request->jumlah;
        $barang->save();

        return redirect()->route('barang-masuk.index')
            ->with('success', 'Barang masuk berhasil ditambahkan dan stok bertambah!');
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'databarang_id' => 'required|exists:databarang,id',
            'jumlah' => 'required|integer|min:1',
            'tanggal' => 'required|date',
        ]);

        $barangmasuk = BarangMasuk::findOrFail($id);

        // Rollback stok lama
        $barangLama = Databarang::findOrFail($barangmasuk->databarang_id);
        $barangLama->jumlah -= $barangmasuk->jumlah;
        $barangLama->save();

        // Update data
        $barangmasuk->update($request->all());

        // Tambah stok baru
        $barangBaru = Databarang::findOrFail($request->databarang_id);
        $barangBaru->jumlah += $request->jumlah;
        $barangBaru->save();

        return redirect()->route('barang-masuk.index')
            ->with('success', 'Barang masuk berhasil diupdate dan stok otomatis berubah!');
    }

    public function destroy(string $id)
    {
        $barangmasuk = BarangMasuk::findOrFail($id);

        // Balikin stok
        $barang = Databarang::findOrFail($barangmasuk->databarang_id);
        $barang->jumlah -= $barangmasuk->jumlah;
        $barang->save();

        $barangmasuk->delete();

        return redirect()->route('barang-masuk.index')
            ->with('success', 'Barang masuk berhasil dihapus dan stok otomatis dikurangi!');
    }
}
