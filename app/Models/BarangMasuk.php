<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BarangMasuk extends Model
{
     protected $table = 'barangmasuk';

      protected $fillable = [
        'id',
        'databarang_id',
        'jumlah',
        'tanggal',
    ];

    public function databarang()
    {
        return $this->belongsTo(DataBarang::class, 'databarang_id', 'id');
    }

    
}
