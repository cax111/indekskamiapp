<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\crudJudulInstrument;

class judulInstrumentController extends Controller
{
    public function tampilJudulInstrument(){
        $judulInstruments = crudJudulInstrument::paginate(10);
        return view('tampil-judul-instrument',['judulInstruments'=>$judulInstruments]);
    }
    public function tambahJudulInstrument(){
    	return view('tambah-judul-instrument');
    }
    public function prosesTambahJudulInstrument(Request $request){ 
    	$judulInstruments = crudJudulInstrument::all();
        foreach($judulInstruments AS $cek){
            if($request->isi_judul_instrument==$cek->isi_judul_instrument){
                return back()->withErrors(["isi_judul_instrument" => "Nama Judul Instrument telah terpakai."]);
            }
        }
        $rules = array(
            'isi_judul_instrument'=>'required',
        );
        $validator = \Validator::make($request->all(),$rules);

        if($validator->fails()){
            return back()
                ->withErrors($validator) // tampilkan error input pada halaman login
                ->withInput(); // tampilkan semua input dalam form
        }else{
            try{
                $input = new crudJudulInstrument;
                $input->isi_judul_instrument   = $request->get('isi_judul_instrument');
                $input->save();

                return \Redirect('tampil-judul-instrument');
            }catch(\Exception $e){
                return \Redirect('tampil-judul-instrument')->withErrors(["gagal" => "Gagal Input Data kedalam Database.".$e->getMessage()]);
            }
        }
    }

    public function ubahJudulInstrument($id){
        $judulInstrument = crudJudulInstrument::find($id);
        return view('ubah-judul-instrument',['judulInstrument'=>$judulInstrument]);
    }
    public function prosesUbahJudulInstrument(Request $request, $id){
        $judulInstruments = crudJudulInstrument::all();
        foreach($judulInstruments AS $cek){
            if($request->isi_judul_instrument==$cek->isi_judul_instrument){
                return back()->withErrors(["isi_judul_instrument" => "Nama Judul Instrument telah terpakai."]);
            }
        }
        $rules = array(
            'isi_judul_instrument'=>'required',
        );
        $validator = \Validator::make($request->all(),$rules);

        if($validator->fails()){
            return back()
                ->withErrors($validator) // tampilkan error input pada halaman login
                ->withInput(); // tampilkan semua input dalam form
        }else{
            try{
                $input = crudJudulInstrument::find($id);
                $input->isi_judul_instrument   = $request->get('isi_judul_instrument');
                $input->save();

                return \Redirect('tampil-judul-instrument');
            }catch(\Exception $e){
                return \Redirect('tampil-judul-instrument')->withErrors(["gagal" => "Gagal Update Data kedalam Database."]);
            }
        }
    }

    public function hapusJudulInstrument($id){
    	$auth = \Auth::user();
	    if($auth->role!="admin"){		// fungsi if ini untuk membatasi hanya role admin yang bisa menghapus data user
			return \Redirect('tampil-judul-instrument')->withErrors(["gagal" => "Gagal menghapus data, Hanya admin yang diperbolehkan menghapus data."]);
    	}elseif($id <= '8'){
    		return \Redirect('tampil-judul-instrument')->withErrors(["gagal" => "Gagal menghapus data, Hanya data dengan ID lebih dari delapan yang bisa dihapus"]);
    	}

    	try{
	    	$judulInstrument = crudJudulInstrument::find($id);
			$judulInstrument->delete();
			return \Redirect('tampil-judul-instrument');
    	}catch(\Exception $e){
			return \Redirect('tampil-judul-instrument')->withErrors(["gagal" => "Gagal menghapus data, silakan cek relasi data tersebut."]);
		}
    }
}
