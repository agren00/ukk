<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    use HasFactory;

    // protected $table = 'penjualans';

    protected $fillable = ['kodebarang', 'namabarang','kategori_id', 'satuan_id', 'jumlah', 'harga_jual', 'total_harga', 'tanggal'];

    public function kategoris()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id', 'id');
    }

    public function satuans()
    {
        return $this->belongsTo(Satuan::class, 'satuan_id', 'id');
    }
}
