<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Redirect;
use Auth;
use Hash;
use Session;
use App\login;
use App\crudIdentitas;

class loginController extends Controller
{
	public function tampilLogin(){
    	return view('login');
	}

	public function prosesLogin(Request $request){
		// membuat rules untuk input yang masuk
		$rules = array(
		    'username'    => 'required|alphaNum|min:6', // username diset dengan alphanumeric dan minimal 6 karakter
		    'password' => 'required|alphaNum|min:8' // password diset dengan aphanumeric dan minimal 8 karakter
		);
		//cek input dari form login menggunakan fungsi validator dari laravel
		$validator = Validator::make($request->all(), $rules);
		//jika gagal, kembali ke form login
		if ($validator->fails()){
		    return Redirect::to('login')
		    	->withErrors(['gagalLogin'=>'Username Atau Password yang anda masukan salah!']); // tampilkan error pada halaman login
		}else {
		    // membuat array untuk autentifikasi
		    $userdata = array(
		        'username'	=> $request->get('username'),
		        'password'	=> $request->get('password')
		    );
		    if (Auth::attempt($userdata)) {
		    	$user = \Auth::user();
		    	$tampil = crudIdentitas::where('id_responden', $user->id_user)->first();
		    	$hitung = json_decode($tampil, true);
		    	session(['isi_identitas' => $hitung]);
		        return Redirect::to('/');
		    } else { 
		        return Redirect::to('login')->withErrors(['gagalLogin'=>'Username Atau Password yang anda masukan salah!']);
		    }

		}
	}

	public function prosesLogout(){
		Auth::logout();
		return Redirect::to('login');
	}
}
