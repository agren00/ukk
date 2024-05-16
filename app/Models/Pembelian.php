<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembelian extends Model
{
    use HasFactory;


    protected $fillable = ['kodebarang', 'namabarang', 'kategori_id', 'satuan_id',  'jumlah', 'harga_beli', 'total_harga', 'tanggal'];

    protected $primaryKey = 'pembelian_id';


    // Di dalam model Pembelian.php
    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id', 'id');
    }

    public function satuans()
    {
        return $this->belongsTo(Satuan::class, 'satuan_id', 'id');
    }

    // App\Models\Pembelian.php

    public function stok()
    {
        return $this->hasOne(Stok::class, 'pembelian_id');
    }


   
}
