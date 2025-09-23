<?php

namespace App\Models;
use Illuminate\Database\Eloquent\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataBarang extends Model
{
    

    protected $table = 'databarang';

    protected $fillable = [
        'nama',
        'kode',
        'jumlah',
        

    ];

    public function BarangMasuk()
    {
        return $this->hasMany(BarangMasuk::class, 'databarang_id', 'id');
    }

    public function BarangKeluar()
    {
        return $this->hasMany(BarangKeluar::class, 'databarang_id', 'id');
    }

   

}
