<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Pembelian;
use DataTables;
use App\Models\Penjualan;
use App\Models\Produck;
use App\Models\Satuan;
use App\Models\Stok;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Contracts\Service\Attribute\Required;
class PenjualanController extends Controller
{
    public function databarang_keluar(){
        $produks =Produck::all();
        $kategoris = Kategori::all();
        $datee = Satuan::all();
        $kat = Kategori::all();
        $agren = Penjualan::all();
        $id = Penjualan::count();
        $penjualan = Penjualan::all();
     return view('penjualan.databarang_keluar',['agren' => $agren ,'kat' =>$kat, 'id' => $id,'datee' =>$datee,'kategoris' =>$kategoris,'producks'=>$produks,'penjualan']);
    }

    public function save(){
        // $produks = Produck::all();
        // $kat = Kategori::all();
        $penjualan =Penjualan::all();
        $produks =Produck::all();
        $kategoris = Kategori::all();
        $satuans = Satuan::all();
        $kat = Kategori::all();
        $datee = Satuan::all();
        $query = "
            SELECT A.*, B.nama_kategori, C.nama_satuan
            FROM producks A
            LEFT JOIN kategoris B ON A.kategori_id = B.id
            LEFT JOIN satuans C ON A.satuan_id = C.id
        ";

        $produks = DB::select($query);
        // Generate kode produk secara otomatis
      $latestPenjualan = Penjualan::latest()->first();
      $latestCode = $latestPenjualan ? $latestPenjualan->kodebarang : 'BRNK000';
      $codeNumber = intval(substr($latestCode, 4)) + 1;
      $newCode = 'BRNK' . str_pad($codeNumber, 3, '0', STR_PAD_LEFT);
        return view('penjualan.inputbarang_keluar', compact('kat','datee','newCode', 'produks','kategoris','satuans','penjualan'));
        // dd($request->all());
    }

    public function tampilbarang_keluar(Request $request)
{
    // Validasi data
    $validatedData = $request->validate([
        'kodebarang' => 'required',
        'namabarang' => 'required',
        'kategori_id' => 'required',
        'satuan_id' => 'required',
        'jumlah' => 'required',
        'harga_jual' => 'required',
        'total_harga' => 'required',
        'tanggal' => 'required',
    ]);

    // Buat penjualan
    $penjualan = Penjualan::create($validatedData);

    if ($penjualan) {
        // Kurangi stok produk yang terjual
        $produk = Produck::where('nama_produck', $penjualan->namabarang)->first();
        if ($produk) {
            $produk->jumlah_stok -= $penjualan->jumlah;
            $produk->save();
        }

        // Redirect dengan pesan sukses
        return redirect()->route('databarang_keluar')->with('success', 'Penjualan berhasil! <button onclick="cetakNota('.$penjualan->id.')">Cetak Nota</button>');
    } else {
        // Redirect dengan pesan error jika gagal
        return redirect()->route('databarang_keluar')->with('error', 'Gagal melakukan penjualan!');
    }
}


    public function editbarangkeluar($id)
    {
        $agren = Penjualan::where('id', $id)->first();
        $kat = Kategori::all();
        $datee = Satuan::all();
        return view('penjualan.editbarang_keluar', compact('agren', 'kat', 'datee'));
    }

    public function updatebarangkeluar(Request $request, $id){
        // dd($request->all());
        $agren = Penjualan::where('id', $id)->first();
        $result =  $agren->update($request->all());
        // dd($result);
        return redirect()->route('databarang_keluar')->with('success', 'Edit Data Barang Keluar Berhasil!');
    }

    public function deletebarangkeluar($id){
        $agren = Penjualan::where('id', $id)->first();
        $agren->delete();
        return redirect()->route('databarang_keluar')->with('success', ' Data Barang Keluar Berhasil Dihapus!!');
    }

    public function cetaknota($id) {
        // Lakukan proses pencetakan nota berdasarkan ID penjualan
        // Contoh: ambil data penjualan dari database berdasarkan ID, lalu buat nota PDF atau format lainnya

        // Simulasikan respons sukses
        return response()->json(['success' => true]);
    }


}

