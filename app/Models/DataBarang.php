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

    public function DataBarang()
{
    return $this->belongsTo(DataBarang::class, 'databarang_id', 'id');
}

}
