<?php

namespace App\Http\Controllers;

use App\Models\Satuan;
use Illuminate\Http\Request;

class SatuanController extends Controller
{
 public function satuan()
 {
    $datee = Satuan::all();
    return view('satuan.satuan',['datee'=> $datee]);
 }

 public function save_satuan()
 {

     return view('satuan.input_satuan');

 }

 public function tampil_satuan(Request $request)
 {
     $request->validate([

         'nama_satuan' => 'required',
     ]);

     Satuan::create($request->all());

     return redirect()->route('satuan')->with('success', ' created successfully.');
 }

 public function edit_satuan($id)
 {
     $datee = Satuan::where('id', $id)->first();
     return view('satuan.edit_satuan', compact('datee'));
 }

 public function update_satuan(Request $request, $id)
 {

     $datee = Satuan::where('id', $id)->first();
     $result =  $datee->update($request->all());
     return redirect()->route('satuan')->with('success', 'Edit Satuan Berhasil!');
 }

 public function delete_satuan($id){
    $datee = Satuan::where('id', $id)->first();
    $datee->delete();
    return redirect()->route('satuan')->with('success', ' Data Satuan  Berhasil Dihapus!!');
}


}
