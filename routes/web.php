<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\PembelianController;
use App\Http\Controllers\ProduckController;
use App\Http\Controllers\SatuanController;
use App\Http\Controllers\SesiController;
use App\Http\Controllers\StokController;
use App\Models\Dashboard;
use App\Models\Kategori;
use App\Models\Produck;
use App\Models\Satuan;
use App\Models\Stok;
use Illuminate\Routing\RouteRegistrar;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
// Route::get('/editpembelian/{kodebarang}', [PembelianController::class, 'editpembelian'])->name('editpembelia');
// Route::get('/', function () { return view('welcome');});

Route::get('/home', [PembelianController::class, 'home'])->name('home');
Route::get('/create', [PembelianController::class, 'create'])->name('create');
Route::post('/store', [PembelianController::class, 'store'])->name('store');
Route::get('/edit/{kodebarang}', [PembelianController::class, 'editpembelian'])->name('edit');
Route::post('/update/{kodebarang}', [PembelianController::class, 'update'])->name('update');
Route::get('/delete/{kodebarang}', [PembelianController::class, 'delete'])->name('delete');

Route::get('/databarang_keluar', [PenjualanController::class, 'databarang_keluar'])->name('databarang_keluar');
Route::get('/save', [PenjualanController::class, 'save'])->name('save');
Route::post('/tampilbarang_keluar', [PenjualanController::class, 'tampilbarang_keluar'])->name('tampilbarang_keluar');
Route::get('/editbarang_keluar/{id}', [PenjualanController::class, 'editbarangkeluar'])->name('editbarang_keluar');
Route::post('/updatebarangkeluar/{id}', [PenjualanController::class, 'updatebarangkeluar'])->name('updatebarangkeluar');
Route::get('/deletebarangkeluar/{id}', [PenjualanController::class, 'deletebarangkeluar'])->name('deletebarangkeluar');

Route::get('/', [SesiController::class, 'index'])->name('index');
Route::post('/login', [SesiController::class, 'login'])->name('login');
Route::get('/logout', [SesiController::class, 'logout'])->name('logout');

Route::get('/kategori', [KategoriController::class, 'kategori'])->name('kategori');
Route::get('/savedata_kategori', [KategoriController::class, 'savedata_kategori'])->name('savedata_kategori');
Route::post('/tampildata_kategori', [KategoriController::class, 'tampildata_kategori'])->name('tampildata_kategori');
Route::get('/editdata_kategori/{id}', [KategoriController::class, 'editdata_kategori'])->name('editdata_kategori');
Route::post('/update_kategori/{id}', [KategoriController::class, 'update_kategori'])->name('update_kategori');
Route::get('/delete_kategori/{id}', [KategoriController::class, 'delete_kategori'])->name('delete_kategori');

Route::get('/profil', [PembelianController::class, 'profil'])->name('profil');

Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

//untuk menangani laporan pembelian dan penjualan//
Route::get('/laporan_pembelian', [DashboardController::class, 'laporan_pembelian'])->name('laporan_pembelian');
Route::get('/laporan_penjualan', [DashboardController::class, 'laporan_penjualan'])->name('laporan_penjualan');

Route::get('/produck', [ProduckController::class, 'produck'])->name('produck');
Route::get('/save_produck', [ProduckController::class, 'save_produck'])->name('save_produck');
Route::post('/tampil_produck', [ProduckController::class, 'tampil_produck'])->name('tampil_produck');

Route::get('/edit_produck/{id}', [ProduckController::class, 'edit_produck'])->name('edit_produck');
Route::post('/update_produck/{id}', [ProduckController::class, 'update_produck'])->name('update_produck');
Route::get('/delete_produck/{id}', [ProduckController::class, 'delete_produck'])->name('delete_produck');

Route::get('/satuan', [SatuanController::class, 'satuan'])->name('satuan');
Route::get('/save_sauan', [SatuanController::class, 'save_satuan'])->name('save_satuan');
Route::post('/tampil_satuan', [SatuanController::class, 'tampil_satuan'])->name('tampil_satuan');
Route::get('/edit_satuan/{id}', [SatuanController::class, 'edit_satuan'])->name('edit_satuan');
Route::post('/update_satuan/{id}', [SatuanController::class, 'update_satuan'])->name('update_satuan');
Route::get('/delete_satuan/{id}', [SatuanController::class, 'delete_satuan'])->name('delete_satuan');

Route::get('/jual', [DashboardController::class, 'jual'])->name('jual');

Route::get('/get-master-barang-info/{namabarang}', [PenjualanController::class, 'get_master_barang_info'])->name('getmasterbaranginfo');

Route::get('/index_stok', [StokController::class, 'index_stok'])->name('index_stok');
Route::get('/cetaknota/{id}', [PenjualanController::class,'cetaknota'])->name('cetaknota');
