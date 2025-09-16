<?php

namespace App\Models;
use Illuminate\Database\Eloquent\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangMasuk extends Model
{
    
    protected $table = 'barang_masuk';

    protected $fillable = [
        'nama',
        'kode',
        'jumlah',
        'tanggal',
    ];
    public function databarang()
    {
        return $this->belongsTo(DataBarang::class);
    }
}