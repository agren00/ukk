<?php

namespace App\Http\Controllers;

use App\Models\Pembelian;
use App\Models\Stok;
use Illuminate\Http\Request;

class StokController extends Controller
{
    public function index_stok()
    {
        $stoks= Stok::all();
        $pembelians = Pembelian::all();
        // return $this->hasOne(Stok::class, 'pembelian_id');
        return view('stok.data_stok', ['pembelians' => $pembelians,'stoks'=>$stoks]);

    }

//     public function createStokFromPembelian()
// {
//     // Ambil semua pembelian

//     $pembelians = Pembelian::all();

//     // Iterasi melalui setiap pembelian
//     foreach ($pembelians as $pembelian) {
//         // Simpan pembelian sebagai entri stok baru
//         Stok::create([
//             'nama_stok' => $pembelian->namabarang,
//             'jumlah_stok' => $pembelian->jumlah,
//             'tanggal_update' => $pembelian->tanggal,
//         ]);
//     }
// }

public function updateStok(Request $request)
{
    // Ambil data pembelian terbaru
    // $pembelian = Pembelian::latest()->first();

    $pembelianId = $request->input('pembelian_id');
    $jumlahPembelian = $request->input('jumlah');
    $pembelian = Pembelian::latest()->first();
    // Cari data stok dengan nama yang sama
    // $stok = Stok::whereRaw('LOWER(nama_stok) = ?', [$pembelian->namabarang->lower()])->first();
    // $stok = Stok::where('pembelian_id', $pembelianId)->first();
    $stok = Stok::whereRaw('LOWER(nama_stok) = ?', [$pembelian->namabarang->lower()])->first();

    // Jika data stok sudah ada
    // Jika data stok sudah ada
    if ($stok) {
        // Jika data pembelian sudah ada, tambahkan jumlah pembelian ke jumlah stok yang ada
        $stok->jumlah_stok += $jumlahPembelian;
        $stok->save();
    } else {
        // Buat data stok baru
        Stok::create([
            'nama_stok' => $request->input('nama_stok'),
            'tanggal_update' => $request->input('tanggal_update'),
            'pembelian_id' => $pembelianId,
            'jumlah_stok' => $jumlahPembelian,
        ]);
    }

    return redirect()->route('home')->with('success', 'Stok berhasil diperbarui!');
}

}
