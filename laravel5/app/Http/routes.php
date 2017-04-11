<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::get('mahasiswa_pengguna','MahasiswaController@mahasiswa');
Route::get('mahasiswa_pengguna/semua', 'MahasiswaController@semua_mahasiswa');
Route::get('mahasiswa/jadwal/ruangan', 'Jadwal_matakuliahController@jadwal_kulmhs');
Route::get('/',function(){
	return view('welcome');
});

Route::get('pengguna','PenggunaController@awal');
Route::get('pengguna/tambah','PenggunaController@tambah');
Route::get('pengguna/{pengguna}','PenggunaController@lihat');
Route::post('pengguna/simpan','PenggunaController@simpan');
Route::get('pengguna/edit/{pengguna}','PenggunaController@edit');
Route::post('pengguna/edit/{pengguna}','PenggunaController@update');
Route::get('pengguna/hapus/{pengguna}','PenggunaController@hapus');

Route::get('dosen','dosenController@awal');
Route::get('dosen/tambah','dosenController@tambah');
Route::get('dosen/semua', 'Dosen_matakuliahController@semua_dosen');
Route::get('dosen/semua_matkul', 'Dosen_matakuliahController@semua_matkul');
Route::get('dosen_profil', 'DosenController@ket_dosen');
Route::get('dosen/{pengguna}', 'dosenController@lihat');
Route::post('dosen/simpan', 'dosenController@simpan');
Route::get('dosen/edit/{pengguna}', 'dosenController@edit');
Route::post('dosen/edit/{pengguna}', 'dosenController@update');
Route::get('dosen/hapus/{pengguna}', 'dosenController@hapus');

Route::get('matakuliah', 'matakuliahcontroller@awal');
Route::get('matakuliah/tambah', 'matakuliahcontroller@tambah');
Route::get('matakuliah/{matakuliah}','matakuliahcontroller@lihat');
Route::post('matakuliah/simpan','matakuliahcontroller@simpan');
Route::get('matakuliah/edit/{matakuliah}','matakuliahcontroller@edit');
Route::post('matakuliah/edit/{matakuliah}','matakuliahcontroller@update');
Route::get('matakuliah/hapus/{matakuliah}','matakuliahcontroller@hapus');

Route::get('mahasiswa','mahasiswaController@awal');
Route::get('mahasiswa/tambah','mahasiswaController@tambah');
Route::get('mahasiswa/lihat/{mahasiswa}', 'MahasiswaController@lihat');
Route::post('mahasiswa/simpan', 'MahasiswaController@simpan');
Route::get('mahasiswa/edit/{mahasiswa}', 'MahasiswaController@edit');
Route::post('mahasiswa/edit/{mahasiswa}', 'MahasiswaController@update');
Route::get('mahasiswa/hapus/{mahasiswa}', 'MahasiswaController@hapus');

Route::get('ruangan', 'ruangancontroller@awal');
Route::get('ruangan/tambah', 'ruangancontroller@tambah');
Route::get('ruangan/{ruangan}','ruangancontroller@lihat');
Route::post('ruangan/simpan','ruangancontroller@simpan');
Route::get('ruangan/edit/{ruangan}','ruangancontroller@edit');
Route::post('ruangan/edit/{ruangan}','ruangancontroller@update');
Route::get('ruangan/hapus/{ruangan}','ruangancontroller@hapus');

Route::get('dosen_matakuliah','dosen_matakuliahController@awal');
Route::get('dosen_matakuliah/tambah','dosen_matakuliahController@tambah');
Route::get('dosen/semua', 'Dosen_matakuliahController@semua_dosen');
Route::get('dosen/semua_matkul', 'Dosen_matakuliahController@semua_matkul');
Route::get('dosen_matakuliah/{dosen_matakuliah}', 'Dosen_matakuliahController@lihat');
Route::post('dosen_matakuliah/simpan', 'Dosen_matakuliahController@simpan');
Route::get('dosen_matakuliah/edit/{dosen_matakuliah}', 'Dosen_matakuliahController@edit');
Route::post('dosen_matakuliah/edit/{dosen_matakuliah}', 'Dosen_matakuliahController@update');
Route::get('dosen_matakuliah/hapus/{dosen_matakuliah}', 'Dosen_matakuliahController@hapus');

Route::get('dosen_profil', 'DosenController@ket_dosen');


Route::get('jadwal_matakuliah/', 'Jadwal_matakuliahController@awal');
Route::get('jadwal_matakuliah/lihat/{jadwal_matakuliah}', 'Jadwal_matakuliahController@lihat');
Route::get('jadwal_matakuliah/tambah', 'Jadwal_matakuliahController@tambah');
Route::post('jadwal_matakuliah/simpan', 'Jadwal_matakuliahController@simpan');
Route::get('jadwal_matakuliah/edit/{jadwal_matakuliah}', 'Jadwal_MatakuliahController@edit');
Route::post('jadwal_matakuliah/edit/{jadwal_matakuliah}', 'Jadwal_MatakuliahController@update');
Route::get('jadwal_matakuliah/hapus/{jadwal_matakuliah}', 'Jadwal_MatakuliahController@hapus');


/*Route::get('/', function (){
	return view('welcome');
});
	Route::get('arul', function (){
	return "Hayyyyyyyy";
});
	Route::get("pengguna/{pengguna?}", function ($pengguna ="ffff")
	{
	return "halo";
});
	Route::get("berita/{berita?}", function($berita = "Laravel 5"){
		return"berita $berita belum dibaca";
});
	Route::get("kelas_b/framework/{mhs?}", function ($mhs = anonim){
		return"sembarang $mhs sembarang";
}); */