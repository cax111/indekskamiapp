<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\crudInstrument;
use App\crudIdentitas;
use App\crudDetailInstrument;
use App\crudJudulInstrument;
use App\crudParameter;

class instrumentController extends Controller
{
    //tampil ini untuk dihalaman assessment
    public function tampilInstrument($idVar){
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

        $pertanyaan = crudInstrument::select('*')
                                    ->join('tb_variable','tb_variable.id_variable','tb_instrument.id_variable')
                                    ->join('tb_judul_instrument','tb_judul_instrument.id_judul_instrument','tb_instrument.id_judul_instrument')
                                    ->where('tb_instrument.id_variable',$idVar)->orderBy('tb_judul_instrument.id_judul_instrument', 'ASC')->get();
        $pertanyaan->load(['detailInstrument'=>function($query){
                                                    return $query->select('*')->join('tb_parameter','tb_parameter.id_parameter','tb_detail_instrument.id_parameter');
                                                }
                        ]);
        return view('assessment',['pertanyaan'=>$pertanyaan]);
    }
    //tampil ini untuk dihalaman tampil instrument
    public function tampilDataInstrument($id){
        $instruments = crudInstrument::select('*')->where('tb_instrument.id_variable',$id)->paginate(10);
        return view('tampil-instrument',['instruments'=>$instruments,'id'=>$id]);
    }

    public function hapusInstrument($id){
        $auth = \Auth::user();
        $instrument = crudInstrument::find($id);
        if($auth->role!="admin"){       // fungsi if ini untuk membatasi hanya role admin yang bisa menghapus data user
            return \Redirect('tampil-instrument/'.$id)->withErrors(["gagal" => "Gagal menghapus data, Hanya admin yang diperbolehkan menghapus data."]);
        }elseif($instrument->id_variable <= '6'){
            return \Redirect('tampil-instrument/'.$id)->withErrors(["gagal" => "Gagal menghapus data, Hanya data dengan ID Variablenya lebih dari enam yang bisa dihapus"]);
        }

        try{
            $detailInstrument = crudDetailInstrument::where("id_instrument","=",$id);
            $detailInstrument->delete();
            $instrument = crudInstrument::find($id);
            $id_variable = $instrument->id_variable;
            $instrument->delete();
            return \Redirect('tampil-instrument/'.$id_variable);
        }catch(\Exception $e){
            return \Redirect('tampil-instrument/'.$id_variable)->withErrors(["gagal" => "Gagal menghapus data, silakan cek relasi data tersebut."]); //.$e->getMessage() untuk menampilkan pesan error query sql.
        }
    }

    public function tambahInstrument($id){
        $judul_instrument = crudJudulInstrument::all();
        $parameter = crudParameter::all();
        return view('tambah-instrument',['id'=>$id,'judul_instrument'=>$judul_instrument, 'parameter'=>$parameter]);
    }
    public function prosesTambahInstrument(Request $request, $id){
        //proses menghitung jumlah jawaban yang disertakan pada instrument tersebut
        $hitung = count($request->parameter);
        $rules = array(
            'judul_instrument'=>'required',
            'bobot_instrument'=>'required|numeric',
            'isi_instrument'=>'required',
            'parameter'=>'required',
        );
        $validator = \Validator::make($request->all(),$rules);

        if($validator->fails()){
            return back()
                ->withErrors($validator) // tampilkan error input pada halaman login
                ->withInput(); // tampilkan semua input dalam form
        }else{
            try{
                $input = new crudInstrument;
                $input->id_variable             = $id;
                $input->id_judul_instrument     = $request->get('judul_instrument');
                $input->bobot_instrument        = $request->get('bobot_instrument');
                $input->isi_instrument          = $request->get('isi_instrument');
                $input->save();

                echo "<script>alert('berhasil')</script>";
                $cek = crudInstrument::orderBy('id_instrument', 'desc')->first();
                foreach($request->parameter as $tampil){
                    $input = new crudDetailInstrument;
                    $input->id_instrument       = $cek->id_instrument;
                    $input->id_parameter        = $tampil;
                    $input->save();
                    echo "<script>alert('berhasil')</script>";
                }

                return \Redirect('tampil-instrument/'.$id);
            }catch(\Exception $e){
                echo "<script>alert('gagal')</script>";
                return \Redirect('tampil-instrument/'.$id)->withErrors(["gagalInput" => "Gagal Input Data kedalam Database."]);
            }
        }
        //echo "<script>alert('".count($request->parameter)."')</script>";
        //return view('tambah-instrument')->;
    }

    //tampil ini untuk dihalaman tampil instrument
    public function tampilDetailInstrument($id){
        $instruments = crudInstrument::select('*')->where('id_instrument',$id)->paginate(10);
        return view('tampil-detail-instrument',['instruments'=>$instruments,'id'=>$id]);
    }


}
