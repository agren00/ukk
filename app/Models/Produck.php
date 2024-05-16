<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produck extends Model
{
    use HasFactory;

      protected $fillable =['kode_produck','nama_produck','kategori_id','harga_beli','harga_jual','satuan_id','jumlah_stok','tanggal'];

    public function kategoris()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id', 'id');
    }

    public function satuans()
    {
        return $this->belongsTo(Satuan::class, 'satuan_id', 'id');
    }

    public function stok()
    {
        return $this->hasOne(Stok::class, 'produck_id', 'id'); // 'produck_id' adalah kunci asing di tabel stok
    }

    
}
