<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\crudJawabanInstrument;
use App\crudVariable;
use App\crudIdentitas;
use App\crudParameter;

class jawabanInstrumentController extends Controller
{
    public function tampilHasilAssessment(){
      // cek apakah role assessor atau bukan
      if(\Auth::user()->role != "assessor"){
        redirect()->to('/')->send();
      }

      // inisialisasi data  dari model
      $dataJawabanInstrument = crudJawabanInstrument::select('*')
                                                      ->join(\DB::raw('(tb_detail_instrument inner join (tb_instrument inner join tb_variable on tb_instrument.id_variable=tb_variable.id_variable) on tb_instrument.id_instrument=tb_detail_instrument.id_instrument)'),'tb_detail_instrument.id_detail_instrument','tb_jawaban_instrument.id_detail_instrument')
                                                      ->join(\DB::raw('(tb_user inner join tb_responden on tb_responden.id_user=tb_user.id_user)'),'tb_user.id_user','tb_jawaban_instrument.id_user')
                                                      ->get();
      $dataVariable = crudVariable::all();
      // mengembalikan nilai fungsi dengan view dan data yang disisipkan.
      return view('tampil-hasil-assessment',['data'=>$dataJawabanInstrument, 'data2'=>$dataVariable]);
    }

    public function tampilDetailHasilAssessment($id){
      // cek apakah role assessor atau bukan
      if(\Auth::user()->role != "assessor"){
        redirect()->to('/')->send();
      }
      $dataJawabanInstrument = crudJawabanInstrument::select('*')
                                                    ->join(\DB::raw('(tb_detail_instrument inner join (tb_instrument inner join tb_variable on tb_instrument.id_variable=tb_variable.id_variable) on tb_instrument.id_instrument=tb_detail_instrument.id_instrument)'),'tb_detail_instrument.id_detail_instrument','tb_jawaban_instrument.id_detail_instrument')
                                                    ->join(\DB::raw('(tb_user inner join tb_responden on tb_responden.id_user=tb_user.id_user)'),'tb_user.id_user','tb_jawaban_instrument.id_user')
                                                    ->where('tb_jawaban_instrument.id_user',$id)
                                                    ->orderBy('tb_variable.id_variable', 'ASC')
                                                    ->get();
      $dataVariable = crudVariable::all();
      return view('tampil-detail-hasil-assessment',['data'=>$dataJawabanInstrument, 'data2'=>$dataVariable, 'get'=>$id]);
    }

    public function prosesIsiJawabanInstrument(Request $request){
        $instruments = crudParameter::all();
        foreach($request->status AS $status){
          $cekisi = 0;
          foreach($instruments AS $cek){
            $pisahData = explode('-',$status);
            $parameter = $pisahData[1];
            if($parameter==$cek->isi_parameter){
              $cekisi = 1;
            }
          }
          if($cekisi == 0){
            return back()->withErrors(["gagal" => "gagal Input Data kedalam Database, silakan cek kembali pengisian status instrumen anda."]);
          }
        }
        $rules = array(
            'status'=>'required',
        );
        $validator = \Validator::make($request->all(),$rules);

        if($validator->fails()){
            return back()
                ->withErrors($validator) // tampilkan error input pada halaman login
                ->withInput(); // tampilkan semua input dalam form
        }else{
            try{
                $id_jawaban_instrument = 0;
                $ambilId = crudJawabanInstrument::orderBy('id', 'DESC')->first();
                if(empty($ambilId)){
                  $id_jawaban_instrument++;
                }else{
                  $id_jawaban_instrument = $ambilId['id_jawaban_instrument'] + 1;
                }
                foreach($request->status AS $status){
                  $pisahData = explode('-',$status);
                  $id_detail_instrument = $pisahData[0];
                  $nilai = $pisahData[2];
                  $bobot = $pisahData[3];
                  $skor = $nilai*$bobot;
                  $input = new crudJawabanInstrument;
                  $input->id_jawaban_instrument  = $id_jawaban_instrument;
                  $input->id_detail_instrument  = $id_detail_instrument;
                  $input->id_user   = \Auth::user()->id_user;
                  $input->skor      = $skor;
                  $input->save();
                }
                return \Redirect('variable')->withErrors(["alert" => "Berhasil Input Data kedalam Database.".var_dump($ambilId)]);
            }catch(\Exception $e){
                return \Redirect('variable')->withErrors(["alert" => "Gagal Input Data kedalam Database.".$e->getMessage()]);
            }
        }
    }
}
