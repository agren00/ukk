<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stok extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_stok',
        'jumlah_stok',
        'tanggal_update',
        'pembelian_id',
    ];

    protected $primaryKey = 'stok_id';
    protected $table = 'stoks';

    public function pembelian()
    {
        return $this->belongsTo('App\Models\Pembelian');
    }

}
