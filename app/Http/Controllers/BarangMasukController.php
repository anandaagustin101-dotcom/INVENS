<?php

namespace App\Http\Controllers;
use App\Models\BarangMasuk;
use App\Models\Databarang;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Http\Request;


class BarangMasukController extends Controller
{
    public function index()
    {
        $barangmasuk = BarangMasuk::with('databarang')->orderBy('created_at', 'desc')->get();
        return view('pages.barangmasuk.index', compact('barangmasuk'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $databarang = databarang::orderBy('nama', 'asc')->get();
        return view('pages.barangmasuk.create', compact('databarang'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $request->validate([
             'nama' => 'required|min:3|max:255',
             'kode' => 'required',
             'jumlah' => 'required',
             'tanggal' => 'required',
             'databarang_id' =>'required',
        ]);
 
        $barangmasuk = BarangMasuk::create([
            'databarang_id' => $request->databarang_id,
            'nama' => $request->nama,
            'kode' => $request->kode,
            'jumlah' => $request->jumlah,
            'tanggal' => $request->tanggal, 
        ]);
        return redirect()->route('barang-masuk.index', $barangmasuk->id)
        ->with('success', 'Barang berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $barangmasuk = BarangMasuk::find($id);
        return view('pages.barangmasuk.show', compact('barangmasuk'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //MENAMPILKAN FORM EDIT
        $barangmasuk = BarangMasuk::find($id);
        $databarang = databarang::orderBy('nama', 'asc')->get();

        return view('pages.barangmasuk.edit', compact('barangmasuk', 'databarang'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([ 
            'nama' => 'required|min:3|max:255',
             'kode' => 'required',
             'jumlah' => 'required',
             'tanggal' => 'required',
             'databarang_id' =>'required',
             
        ], [
            'nama.required' => 'Nama harus diisi',
            'kode.required' => 'Kode harus diisi',
            'jumlah.required' => 'Jumlah harus diisi', 
            'databarang_id.required' => 'DataBarang_id harus diisi',       
        ]);


        $barangmasuk->update([
            'databarang_id' => $request->databarang_id,
            'nama' => $request->nama,
            'kode' => $request->kode,
            'jumlah' => $request->jumlah,
            'tanggal' => $request->tanggal, 
        ]);
        
        return redirect()->route('barang-masuk.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $barangmasuk= BarangMasuk::find($id)->delete();
        return redirect()->back();
    }

}
