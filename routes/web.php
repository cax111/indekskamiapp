<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/','identitasController@tampilIndex')->middleware('auth');
//Route Login
// rute / alamat untuk menampilkan halaman login
Route::get('/login','loginController@tampilLogin')->middleware('guest')->name('login');
// rute / alamat untuk memproses login pengguna
Route::post('/login','loginController@prosesLogin')->middleware('guest');
Route::get('/logout','loginController@prosesLogout')->middleware('auth');
//====================================================================================================//

//Route Variable
// rute / alamat untuk menampilkan halaman variable
Route::get('/variable', 'variableController@tampilVariable')->middleware('auth');
Route::get('/tampil-variable', 'variableController@tampilDataVariable')->middleware('auth');
Route::get('/tambah-variable', 'variableController@tambahVariable')->middleware('auth');
Route::post('/tambah-variable', 'variableController@prosesTambahVariable')->middleware('auth');
Route::get('/ubah-variable/{id}', 'variableController@ubahVariable')->middleware('auth');
Route::post('/ubah-variable/{id}', 'variableController@prosesUbahVariable')->middleware('auth');
Route::get('/hapus-variable/{id}', 'variableController@hapusVariable')->middleware('auth');
//====================================================================================================//

//Route Instrument
// rute / alamat untuk menampilkan halaman instrument
Route::get('/tampil-instrument/{id_variable}', 'instrumentController@tampilDataInstrument')->middleware('auth');
Route::get('/tambah-instrument/{id}', 'instrumentController@tambahInstrument')->middleware('auth');
Route::post('/tambah-instrument/{id}', 'instrumentController@prosesTambahInstrument')->middleware('auth');
Route::get('/hapus-instrument/{id}', 'instrumentController@hapusInstrument')->middleware('auth');
	//================ Route Judul instrument =======================
	Route::get('/tampil-judul-instrument', 'judulInstrumentController@tampilJudulInstrument')->middleware('auth');
	Route::get('/tambah-judul-instrument', 'judulInstrumentController@tambahJudulInstrument')->middleware('auth');
	Route::post('/tambah-judul-instrument', 'judulInstrumentController@prosesTambahJudulInstrument')->middleware('auth');
	Route::get('/ubah-judul-instrument/{id}', 'judulInstrumentController@ubahJudulInstrument')->middleware('auth');
	Route::post('/ubah-judul-instrument/{id}', 'judulInstrumentController@prosesUbahJudulInstrument')->middleware('auth');
	Route::get('/hapus-judul-instrument/{id}', 'judulInstrumentController@hapusJudulInstrument')->middleware('auth');
	//================ Route Judul instrument =======================
	Route::get('/tampil-detail-instrument/{id}', 'instrumentController@tampilDetailInstrument')->middleware('auth');
	//================ Route assesment / penilaian instrument =======================
	Route::get('/assessment/{id_variable}', 'instrumentController@tampilInstrument')->middleware('auth');
	Route::post('/assessment/{id_variable}', 'jawabanInstrumentController@prosesIsiJawabanInstrument')->middleware('auth');
//====================================================================================================//

//Route Hasil Assessment
// rute / alamat untuk menampilkan halaman Hasil Assessment
Route::get('/tampil-hasil-assessment', 'jawabanInstrumentController@tampilHasilAssessment')->middleware('auth');
Route::get('/tampil-detail-hasil-assessment/{id}', 'jawabanInstrumentController@tampilDetailHasilAssessment')->middleware('auth');
//====================================================================================================//

//Route Identitas Responden
// rute / alamat untuk menampilkan halaman Identitas Responden
Route::get('/tampil-identitas', 'identitasController@tampilIdentitas')->middleware('auth');
Route::get('/identitas', 'identitasController@tampilIdentitas')->middleware('auth')->name('identitas');
Route::post('/identitas', 'identitasController@prosesIdentitas')->middleware('auth');
//====================================================================================================//

//Route User
// rute / alamat untuk menampilkan halaman User
Route::get('/tampil-user', 'userController@tampilUser')->middleware('auth');
Route::get('/hapus-user/{id}', 'userController@hapusUser')->middleware('auth');
Route::get('/ubah-user', 'userController@ubahUser')->middleware('auth');
Route::post('/ubah-user', 'userController@prosesUbahUser')->middleware('auth');
Route::get('/tambah-user', 'userController@tambahUser')->middleware('auth');
Route::post('/tambah-user', 'userController@prosesTambahUser')->middleware('auth');
Route::get('/ubah-user/{id}', 'userController@ubahUser')->middleware('auth');
Route::post('/ubah-user/{id}', 'userController@prosesUbahUser')->middleware('auth');
Route::get('/ganti-password/{id}', 'userController@gantiPasswordUser')->middleware('auth');
Route::post('/ganti-password/{id}', 'userController@prosesGantiPasswordUser')->middleware('auth');
//====================================================================================================//
