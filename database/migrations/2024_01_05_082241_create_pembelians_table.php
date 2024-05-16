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

        Schema::create('pembelians', function (Blueprint $table) {
            $table->bigIncrements('pembelian_id');
            $table->string('kodebarang');
            $table->string('namabarang');
            $table->integer('kategori_id');
            $table->integer('satuan_id');
            $table->integer('jumlah');
            $table->decimal('harga_beli',20,0);
            $table->decimal('total_harga',20,0);
            $table->date('tanggal');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembelians');
    }
};
