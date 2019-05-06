<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\crudUser;

class userController extends Controller
{
    public function tampilUser(){
    	$user = crudUser::where("role","!=","admin")->paginate(10);
    	return view('tampil-user',['user'=>$user]);
    }

    public function hapusUser($id){
    	$auth = \Auth::user();
	    if($auth->role!="admin"){		// fungsi if ini untuk membatasi hanya role admin yang bisa menghapus data user
			return \Redirect('tampil-user')->withErrors(["gagal" => "Gagal menghapus data, Hanya admin yang diperbolehkan menghapus data."]);
    	}
    	
    	try{
	    	$user = crudUser::find($id);
	    	if($user->role!="admin"){		//fungsi if ini untuk menahan agar admin tidak bisa menghapus dirinya sendiri
				$user->delete();
				return \Redirect('tampil-user');
    		}
    	}catch(\Exception $e){
			return \Redirect('tampil-user')->withErrors(["gagal" => "Gagal menghapus data, silakan cek relasi data tersebut."]);
		}
    }

    public function tambahUser(){
    	return view('tambah-user');
    }
    public function prosesTambahUser(Request $request){
    	$user = crudUser::all();
    	foreach($user AS $cek){
    	    if($request->username==$cek->username){
			    return back()->withErrors(["username" => "Username telah terpakai."]);
        	}
    	}
    	$rules = array(
    		'username'=>'required|alphaNum|min:6',
    		'password'=>'required|alphaNum|min:8',
    		'role'=>'required',
    	);
    	$validator = \Validator::make($request->all(),$rules);

    	if($validator->fails()){
		    return back()
		    	->withErrors($validator) // tampilkan error input pada halaman login
		        ->withInput(); // tampilkan semua input dalam form
    	}else{
    		try{
		    	$input = new crudUser;
			    $input->username			= $request->get('username');
			    $input->password			= \Hash::make($request->get('password'));
			    $input->role				= $request->get('role');
			    $input->remember_token		= "qwertyuiop";
			    $input->save();

			    return \Redirect('tampil-user');
		   	}catch(\Exception $e){
			    return \Redirect('tampil-user')->withErrors(["gagalInput" => "Gagal Input Data kedalam Database."]);
			}
    	}
    }
//----------------------UNTUK USER DENGAN ROLE 'ADMIN & ASSESSOR'-----------------------------------
    public function ubahUser($id){
        $user = crudUser::find($id);
        return view('ubah-user',['user'=>$user]);
    }
    public function prosesUbahUser(Request $request, $id){
        $rules = array(
            'password'=>'required|alphaNum|min:8',
            'cek-password'=>'required|alphaNum|min:8|same:password',
        );
        $validator = \Validator::make($request->all(),$rules);
        if($validator->fails()){

            return back()
                ->withErrors($validator); // tampilkan error input
        }else{
            try{
                $update = crudUser::find($id);
                $update->password    = \Hash::make($request->get('password'));
                $update->save();

                return \Redirect('tampil-user')->with(["berhasil" => "Berhasil Ubah Password kedalam Database.", "id" => $id]);
            }catch(\Exception $e){
                return \Redirect('tampil-user')->withErrors(["gagalInput" => "Gagal Update Data kedalam Database."]);
            }
        }
    }
//----------------------UNTUK USER DENGAN ROLE 'USER'-----------------------------------
    public function gantiPasswordUser($id){
        $user = crudUser::find($id);
        return view('ganti-password',['user'=>$user,'id'=>$id]);
    }
    public function prosesGantiPasswordUser(Request $request, $id){
        $rules = array(
            'password'=>'required|alphaNum|min:8',
            'cek-password'=>'required|alphaNum|min:8|same:password',
        );
        $validator = \Validator::make($request->all(),$rules);
        if($validator->fails()){

            return back()
                ->withErrors($validator); // tampilkan error input
        }else{
            try{
                $update = crudUser::find($id);
                $update->password    = \Hash::make($request->get('password'));
                $update->save();

                return \Redirect('/')->with(["berhasil" => "Berhasil Ubah Password.", "id" => $id]);
            }catch(\Exception $e){
                return \Redirect('/')->withErrors(["gagalInput" => "Gagal Ubah Password."]);
            }
        }
    }
}
