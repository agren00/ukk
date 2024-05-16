<?php

namespace App\Http\Controllers;

use App\Models\Penjualan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Contracts\Service\Attribute\Required;

class SesiController extends Controller
{
    public function index()
    {
        return view('login.login');
    }

 public  function login(Request $request)
{
    $request->validate([
        'email'=>'required',
        'password'=>'required'
    ],[
        'email.required'=> 'email wajib di isi',
        'password.required'=>'password wajib di isi'
    ]);

    $infologin = [
        'email'=> $request->email,
        'password' =>$request->password,
    ];

    if(Auth::attempt($infologin)){
         return redirect()->route('dashboard');
    }else{
        return redirect('')->withErrors('email dan password yang dimasukkan salah')->withInput();
    }

}

public function logout(Request $request)
{
    // Membersihkan sesi atau token otentikasi
    Auth::logout();

    // Arahkan pengguna ke halaman login atau halaman lain yang sesuai
    return redirect('/');
}


}
