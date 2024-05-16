<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('producks', function (Blueprint $table) {
            $table->id();
            $table->string('kode_produck');
            $table->string('nama_produck');
            $table->integer('kategori_id');
            $table->decimal('harga_beli',20, 0);
            $table->decimal('harga_jual',20, 0);
            $table->integer('satuan_id');
            $table->integer('jumlah_stok')->default(0);
            $table->date('tanggal');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('producks');
    }
};
