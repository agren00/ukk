<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
   public  function Kategori()
    {
        $kat = Kategori::all();
        return view('kategori.kategori', ['kat' => $kat]);
    }


    public function savedata_kategori(Request $request)
    {
        return view('kategori.input_kategori');

        // $kat = Kategori::all();
        // return view('kategori.input_kategori', compact('kat'));
    }

    public function tampildata_kategori(Request $request)
    {
        $request->validate([

            'nama_kategori' => 'required',
        ]);
        // dd($request->all());
        Kategori::create($request->all());

        return redirect()->route('kategori')->with('success', ' created successfully.');
    }

    public function editdata_kategori($id)
    {
        $kat = Kategori::where('id', $id)->first();
        return view('kategori.edit_kategori', compact('kat'));
    }

    public function update_kategori(Request $request, $id)
    {
        // dd($request->all());
        $kat = Kategori::where('id', $id)->first();
        $result =  $kat->update($request->all());
        // dd($result);
        return redirect()->route('kategori')->with('success', 'Edit Kategori Berhasil!');
    }

    public function delete_kategori($id){
        $kat = Kategori::where('id', $id)->first();
        $kat->delete();
        return redirect()->route('kategori')->with('success', ' Data Kategori  Berhasil Dihapus!!');
    }

}
