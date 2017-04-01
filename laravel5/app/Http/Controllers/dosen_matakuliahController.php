<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\dosen_matakuliah;
use App\matakuliah;
class dosen_matakuliahController extends Controller
{
    public function awal()
    {
    	return "Hello dari dosen_matakuliahController";
    }
    public function tambah()
    {
    	return $this->simpan();
    
}
public function simpan()
{
	$dosen_matakuliah = new dosen_matakuliah();
	$dosen_matakuliah->dosen_id = '3';
	$dosen_matakuliah->matakuliah_id = '1';
	$dosen_matakuliah->save();
	return "Data Dosen dengan id Dosen {$dosen_matakuliah->dosen_id} telah disimpan";
}
    public function semua_dosen() {
    $dosen = dosen_matakuliah::all();  //untuk menampilkan semua data 
    foreach ($dosen as $dos) {  //panggilnya pakai foreach
    echo "nama dosen :" .$dos->dosen->nama;
    echo "<br>";
    echo "NIP :" .$dos->dosen->nip;
    echo "<p>";} 
    }
public function semua_matkul() {
    $dosen = dosen_matakuliah::all();  //untuk menampilkan semua data 
    foreach ($dosen as $dos) {  //panggilnya pakai foreach
    echo "nama dosen :" .$dos->dosen->nama;
    echo "<br>";
    echo "NIP :" .$dos->dosen->nip;
    echo "<br>";
    echo " Mengajar Pada matakuliah :".$dos->matakuliah->title;
}
}
}
