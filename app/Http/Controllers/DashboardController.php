<?php

namespace App\Http\Controllers;

use App\Models\Pembelian;
use App\Models\Penjualan;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard(){
        $data = Pembelian::all();
        $agren = Penjualan::all();
        $tanggal = Carbon::now()->toDateString();
        $penjualan_now = Penjualan::count();
        $totalharga_now = Penjualan::sum('total_harga');

        // return $penjualan_now;
        return view('dashboard', compact('agren', 'penjualan_now','totalharga_now','data'));
    }

    // public function jual(){
    //     return view('jual.jual');
    // }

    public function laporan_pembelian(){
        $data = Pembelian::all();
        return view('laporan.laporan_pembelian',['data'=>$data]);
    }

    public function laporan_penjualan(){
        $agren = Penjualan::all();
        return view('laporan.laporan_penjualan',['agren'=>$agren]);
    }
}
