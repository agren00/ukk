<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use DataTables;
use App\Models\Pembelian;
use App\Models\Produck;
use App\Models\Satuan;
use App\Models\Stok;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PembelianController extends Controller
{
    public function home()
    {

        // $data = Pembelian::with('kategori')->get();
        // $pembelians = Pembelian::all();
        $produck = Produck::all();
        $datee = Satuan::all();
        $kat = Kategori::all();
        $data = Pembelian::all();
        $id = Pembelian::count();
        // return view('welcome', ['data' => $data]);
        return view('datapembelian', ['data' => $data, 'id' => $id ,'kat' => $kat ,'datee'=>$datee,'produk'=>$produck]);

    }

    public function create()
    {
        // return view('inputpembelian');
        // $pembelians = Pembelian::all();
        $produck = Produck::all();
        $datee = Satuan::all();
        $kat = Kategori::all();
        $query = "
        SELECT A.*, B.nama_kategori, C.nama_satuan
        FROM producks A
        LEFT JOIN kategoris B ON A.kategori_id = B.id
        LEFT JOIN satuans C ON A.satuan_id = C.id
    ";

    $producks = DB ::select($query);

          // Generate kode produk secara otomatis
      $latestPembelian = Pembelian::latest()->first();
      $latestCode = $latestPembelian ? $latestPembelian->kodebarang : 'BRNM000';
      $codeNumber = intval(substr($latestCode, 4)) + 1;
      $newCode = 'BRNM' . str_pad($codeNumber, 3, '0', STR_PAD_LEFT);


        return view('inputpembelian', compact('kat','datee','newCode','produck'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'kodebarang' => 'required',
            'namabarang' => 'required',
            'kategori_id' => 'required',
            'satuan_id' => 'required',
            'jumlah' => 'required|numeric',
            'harga_beli' => 'required|numeric',
            'total_harga' => 'required|numeric',
            'tanggal' => 'required|date',
        ]);

        // Buat pembelian baru
        $pembelian = Pembelian::create($validatedData);

        if ($pembelian) {
            // Cari stok dengan nama yang sama
            $stok = Produck::where('nama_produck', $pembelian->namabarang)->first();

            if ($stok) {
                // Jika stok ditemukan, tambahkan jumlahnya
                $stok->jumlah_stok += $pembelian->jumlah;
                $stok->save();
            } else {
                // Jika stok tidak ditemukan, buat baru
                Stok::create([
                    'nama_stok' => $pembelian->namabarang,
                    'jumlah_stok' => $pembelian->jumlah,
                    'tanggal_update' => $pembelian->tanggal,
                    'pembelian_id' => $pembelian->pembelian_id, // tambahkan pembelian_id di sini
                ]);
            }

            // Redirect ke halaman home dengan pesan sukses
            return redirect()->route('home')->with('success', 'Pembelian berhasil disimpan dan entri stok berhasil dibuat!');
        } else {
            // Redirect ke halaman home dengan pesan error jika pembelian gagal disimpan
            return redirect()->route('home')->with('error', 'Gagal menyimpan pembelian!');
        }
    }


    public function editpembelian($kodebarang)
    {
        $data  = Pembelian::where('kodebarang', $kodebarang)->first();
        $datee = Satuan::all();
        $kat   = Kategori::all();
        return view('editpembelian', compact('data','kat','datee'));
    }

    public function update(Request $request, $kodebarang)
    {
        // dd($request->all()); // Lihat data yang dikirim dari formulir
        $data = Pembelian::where('kodebarang', $kodebarang)->first();
        $result =  $data->update($request->all());
        // dd($result);
        return redirect()->route('home')->with('success', 'Edit Data Barang Masuk Berhasil!');
    }

    public function delete($kodebarang){
        $data = Pembelian::where('kodebarang', $kodebarang)->first();
        $data->delete();
        return redirect()->route('home')->with('success', 'data berhasil dihapus');
    }

    public function profil(){
        return view('content.profil');
    }

    // public function createStokFromPembelian()
    // {
    //     // Ambil semua pembelian
    //     $pembelians = Pembelian::all();

    //     // Iterasi melalui setiap pembelian
    //     foreach ($pembelians as $pembelian) {
    //         Stok::created([
    //             'nama_stok' => $pembelian->namabarang,
    //             'jumlah_stok' => $pembelian->jumlah,
    //             'tanggal_update' => $pembelian->tanggal, // Provide value explicitly
    //         ]);
    //     }

    //     return redirect()->route('home')->with('success', 'Stok berhasil dibuat dari data pembelian!');
    // }

    // ... existing methods ...

    // public function updateStok()
    // {
    //     // Ambil data pembelian terbaru
    //     $pembelian = Pembelian::latest()->first();

    //     // Cari data stok dengan nama yang sama
    //     $stok = Stok::whereRaw('LOWER(nama_stok) = ?', [strtolower($pembelian->namabarang)])->first();

    //     // Jika data stok sudah ada
    //     if ($stok) {
    //         // Update jumlah stok
    //         // $stok->jumlah_stok += $pembelian->jumlah;
    //         $pembelian->jumlah +=$stok->jumlah_stok;
    //         $stok->save();
    //     } else {
    //         // Buat data stok baru
    //         Stok::create([
    //             'nama_stok' => $pembelian->namabarang,
    //             'jumlah_stok' => $pembelian->jumlah,
    //             'tanggal_update' => $pembelian->tanggal,
    //         ]);
    //     }

    //     return redirect()->route('home')->with('success', 'Stok berhasil diperbarui!');
    // }



}
