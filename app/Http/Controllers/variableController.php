<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\crudVariable;
use App\crudIdentitas;
use App\crudDetailInstrument;
use App\crudJawabanInstrument;

class variableController extends Controller
{
    public function tampilVariable(){
      // cek apakah pengguna ini tipe user
      if(\Auth::user()->role != "user"){
        redirect()->to('/')->send();
      }
      // ---------------- selesai cek -------------------
      // cek apakah pengguna sudah mengisi identitasnya atau belum
      $id = \Auth::user()->id_user;
      $identitas = crudIdentitas::where('id_user',$id)->get();
      if(empty($identitas)){
        redirect()->to('/identitas')->send();
      }
      // ------------- selesai cek ----------------------
      
    	$variables = crudVariable::all();
      $sudahDiisi = null;
      $now = \Carbon\Carbon::now();
      $jawabanInstruments = crudJawabanInstrument::where('id_user', \Auth::user()->id_user)->orderBy('created_at','DESC')->get();
      if(!empty($jawabanInstruments)){
        $idVarSebelum = null;
        foreach($jawabanInstruments AS $cek){
          $getIdVariable = crudDetailInstrument::select('*')
                                          ->join('tb_instrument','tb_instrument.id_instrument','tb_detail_instrument.id_instrument')
                                          ->where('id_detail_instrument',$cek['id_detail_instrument'])->get();
          if(!empty($getIdVariable)){
            foreach($getIdVariable AS $giv){
              if($now <= $cek['created_at']->addMonth(6)){
                if($idVarSebelum != $giv->id_variable){
                  $idVarSebelum = $giv->id_variable;
                  $sudahDiisi .= $giv->id_variable." ";
                }
              }
            }
          }
        }
      }
      // foreach($jawabanInstruments AS $ji){
      //   if($now <= $ji['created_at']->addMonth(6)){
      //     $sudahDiisi[] = true;
      //   }
      // }

    	return view('variable', ['variables'=>$variables,'sudahDiisi'=>$sudahDiisi]);
    }

    public function tampilDataVariable(){
    	$variables = crudVariable::paginate(10);

    	return view('tampil-variable', ['variables'=>$variables]);
    }

    public function hapusVariable($id){
    	$auth = \Auth::user();
	    if($auth->role!="admin"){		// fungsi if ini untuk membatasi hanya role admin yang bisa menghapus data user
			return \Redirect('tampil-variable')->withErrors(["gagal" => "Gagal menghapus data, Hanya admin yang diperbolehkan menghapus data."]);
    	}elseif($id <= '6'){
    		return \Redirect('tampil-variable')->withErrors(["gagal" => "Gagal menghapus data, Hanya data dengan ID lebih dari enam yang bisa dihapus"]);
    	}

    	try{
	    	$variable = crudVariable::find($id);
			$variable->delete();
			\DB::statement("ALTER TABLE tb_variable AUTO_INCREMENT = $id");
			return \Redirect('tampil-variable');
    	}catch(\Exception $e){
			return \Redirect('tampil-variable')->withErrors(["gagal" => "Gagal menghapus data, silakan cek relasi data tersebut."]);
		}
    }

    public function tambahVariable(){
        return view('tambah-variable');
    }
    public function prosesTambahVariable(Request $request){
        $variable = crudVariable::all();
        foreach($variable AS $cek){
            if($request->nama_variable==$cek->nama_variable){
                return back()->withErrors(["nama_variable" => "Nama variable telah terpakai."]);
            }
        }
        $rules = array(
            'nama_variable'=>'required|alphaNum',
        );
        $validator = \Validator::make($request->all(),$rules);

        if($validator->fails()){
            return back()
                ->withErrors($validator) // tampilkan error input pada halaman login
                ->withInput(); // tampilkan semua input dalam form
        }else{
            try{
                $input = new crudVariable;
                $input->nama_variable   = $request->get('nama_variable');
                $input->save();

                return \Redirect('tampil-variable');
            }catch(\Exception $e){
                return \Redirect('tampil-variable')->withErrors(["gagal" => "Gagal Input Data kedalam Database.".$e->getMessage()]);
            }
        }
    }
    public function ubahVariable($id){
        $variable = crudVariable::find($id);
        return view('ubah-variable',['variable'=>$variable]);
    }
    public function prosesUbahVariable(Request $request, $id){
        $variable = crudVariable::all();
        foreach($variable AS $cek){
            if($request->nama_variable==$cek->nama_variable){
                return back()->withErrors(["nama_variable" => "Nama variable telah terpakai."]);
            }
        }
        $rules = array(
            'nama_variable'=>'required|alphaNum',
        );
        $validator = \Validator::make($request->all(),$rules);

        if($validator->fails()){
            return back()
                ->withErrors($validator) // tampilkan error input pada halaman login
                ->withInput(); // tampilkan semua input dalam form
        }else{
            try{
                $input = crudVariable::find($id);
                $input->nama_variable   = $request->get('nama_variable');
                $input->save();

                return \Redirect('tampil-variable');
            }catch(\Exception $e){
                return \Redirect('tampil-variable')->withErrors(["gagal" => "Gagal Update Data kedalam Database."]);
            }
        }
    }
}
