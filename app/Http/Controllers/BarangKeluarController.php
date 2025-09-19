<?php

namespace App\Http\Controllers;
use App\Models\BarangKeluar;
use App\Models\Databarang;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class BarangKeluarController extends Controller
{
      public function index()
    {
        $barangkeluar = BarangKeluar::with('databarang')->orderBy('created_at', 'desc')->get();
        return view('pages.barangkeluar.index', compact('barangkeluar'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $databarang = Databarang::orderBy('nama', 'asc')->get();
        return view('pages.barangkeluar.create', compact('databarang'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    
        $request->validate([
             'databarang_id' =>'required',
             'jumlah' => 'required',
             'tanggal' => 'required',
        ]);
 
        $barangkeluar = BarangKeluar::create([
            'databarang_id' => $request->databarang_id,
            'jumlah' => $request->jumlah,
            'tanggal' => $request->tanggal, 
        ]);
        return redirect()->route('barang-keluar.index')
        ->with('success', 'Barang berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $barangkeluar = BarangKeluar::find($id);
        return view('pages.barangkeluar.show', compact('barangkeluar'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //MENAMPILKAN FORM EDIT
        $barangkeluar = BarangKeluar::find($id);
        $databarang = databarang::orderBy('id', 'asc')->get();

        return view('pages.barangkeluar.edit', compact('barangkeluar', 'databarang'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
       
        $request->validate([ 
             'nama' =>'required',
             'kode' =>'required',
             'jumlah' => 'required',
             'tanggal' => 'required',
             
        ], [
            'nama' => 'Nama harus diisi', 
            'jumlah.required' => 'Jumlah harus diisi',       
        ]);

        $barangkeluar=BarangKeluar::findOrFail($id);
        $barangkeluar->update([
            'nama' => $request->nama,
            'kode' => $request->kode,
            'jumlah' => $request->jumlah,
            'tanggal' => $request->tanggal, 
        ]);
        
        return redirect()->route('barang-keluar.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $barangkeluar= BarangKeluar::find($id)->delete();
        return redirect()->back();
    }
}
