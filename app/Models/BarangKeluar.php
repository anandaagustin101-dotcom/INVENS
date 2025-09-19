<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BarangKeluar extends Model
{
     protected $table = 'barangkeluar';

      protected $fillable = [
        'id',
        'databarang_id',
        'jumlah',
        'tanggal',
    ];

    public function databarang()
    {
        return $this->belongsTo(databarang::class, 'databarang_id', 'id');
    }

    
}
