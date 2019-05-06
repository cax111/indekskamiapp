<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\crudIdentitas;

class identitasController extends Controller
{
    public function tampilIndex(){
    	$id = \Auth::user()->id_user;
    	$tampil = crudIdentitas::where('id_user', $id)->first();
    	return view('index',['identitas'=>$tampil]);
    }
    public function tampilIdentitas(){
    	$id = \Auth::user()->id_user;
    	$tampil = crudIdentitas::where('id_user', $id)->first();
    	return view('identitas-responden',['identitas'=>$tampil]);
    }
    public function prosesIdentitas(Request $request){
    	$rules = array(
		    'satuan_kerja'    => 'required',
		    'direktorat' => 'required',
		    'departemen'    => 'required',
		    'alamat1' => 'required',
		    'alamat2'    => 'required',
		    'kota' => 'required',
		    'kodepos'    => 'required|numeric',
		    'nomor_telepon' => 'required',
		    'email'    => 'required|email|max:50',
		    'nama' => 'required',
		    'nip'    => 'required',
		    'jabatan' => 'required',
		    'tanggal'    => 'required',
		    'deskripsi' => 'required',
		);
		$validator = \Validator::make($request->all(), $rules);
		if ($validator->fails()){
		    return back()
		    	->withErrors($validator) // tampilkan error input pada halaman login
		        ->withInput(); // tampilkan semua input dalam form
		}else{
			try{
		    	$input = new crudIdentitas;
			    $input->satuan_kerja			= $request->get('satuan_kerja');
			    $input->direktorat				= $request->get('direktorat');
			    $input->departemen				= $request->get('departemen');
			    $input->alamat1					= $request->get('alamat1');
			    $input->alamat2					= $request->get('alamat2');
			    $input->kota					= $request->get('kota');
			    $input->kode_pos				= $request->get('kodepos');
			    $input->nomor_telepon			= $request->get('nomor_telepon');
			    $input->email					= $request->get('email');
			    $input->pengisi_responden		= $request->get('nama');
			    $input->nip_responden			= $request->get('nip');
			    $input->jabatan_responden		= $request->get('jabatan');
			    $input->tanggal_pengisian		= $request->get('tanggal');
			    $input->deskripsi_ruang_lingkup	= $request->get('deskripsi');
			    $input->id_user					= \Auth::user()->id_user;
			    $input->save();

			    return \Redirect('variable');
			}catch(\Exception $e){
			    return \Back()->withErrors(["gagalInput" => "Gagal Input Data kedalam Database.".$e->getMessage()]);
			}
		}
    }
}
