<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Pembelian;
use App\Models\Produck;
use App\Models\Satuan;
use App\Models\Stok;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProduckController extends Controller
{
    public function produck()
    {

        $datee = Satuan::all();
        $kat = Kategori::all();
        $data = Produck::all();
        $id = produck::count();
        return view('produck.produck', ['data' => $data, 'kat' => $kat, 'id' => $id, 'datee' => $datee ]);
    }

    public function save_produck(Request $request)
{
    $stoks = Stok::all();
    $kat = Kategori::all();
    $datee = Satuan::all();
    $query = "
             SELECT A.*, B.nama_kategori, C.nama_satuan
             FROM pembelians A
             LEFT JOIN kategoris B ON A.kategori_id = B.id
             LEFT JOIN satuans C ON A.satuan_id = C.id
          ";
    $pembelians = DB::select($query);

    // Generate kode produk secara otomatis
    $latestProduct = Produck::latest()->first();
    $latestCode = $latestProduct ? $latestProduct->kode_produck : 'PROD000';
    $codeNumber = intval(substr($latestCode, 4)) + 1;
    $newCode = 'PROD' . str_pad($codeNumber, 3, '0', STR_PAD_LEFT);

    // Tampilkan formulir input produk dengan kode produk yang sudah diisi secara otomatis
    return view('produck.inputproduck', compact('kat', 'datee', 'newCode', 'pembelians', 'stoks'));
}


public function tampil_produck(Request $request)
{
    $request->validate([
        'nama_produck' => 'required',
        'kategori_id' => 'required',
        'harga_beli' => 'required',
        'harga_jual' => 'required',
        'satuan_id' => 'required',
        'tanggal' => 'required',
    ]);

    // Simpan data langsung ke dalam database Produck
    Produck::create([
        'kode_produck' =>$request->kode_produck,
        'nama_produck' => $request->nama_produck,
        'kategori_id' => $request->kategori_id,
        'harga_beli' => $request->harga_beli,
        'harga_jual' => $request->harga_jual,
        'satuan_id' => $request->satuan_id,
        'tanggal' => $request->tanggal,
    ]);
    // $produk = produck::findOrFail($request->kode_produck);
    // $produk->jumlah_penjualan += $request->jumlah_stok; // Sesuaikan dengan nama field yang benar
    // $produk->save();

    return redirect()->route('produck')->with('success', 'Produk berhasil ditambahkan.');
}



    public function edit_produck($id)
    {
        $kat = Kategori::all();
        $datee = Satuan::all();
        $data = Produck::where('id', $id)->first();
        return view('produck.edit_produck', compact('data', 'kat', 'datee'));
    }

    public function update_produck(Request $request, $id)
    {
        // Mencari data berdasarkan ID
        $data = Produck::find($id);
        if ($data) {
            // Memperbarui data jika ditemukan
            $data->update($request->all());
            return redirect()->route('produck')->with('success', 'Data produck berhasil diperbarui!');
        } else {
            // Mengembalikan pesan error jika data tidak ditemukan
            return redirect()->route('produck')->with('error', 'Data produck tidak ditemukan!');
        }
    }

    public function delete_produck($id)
    {
        $data = Produck::where('id', $id)->first();
        $data->delete();
        return redirect()->route('produck')->with('success', ' Data Produck  Berhasil Dihapus!!');
    }
}
