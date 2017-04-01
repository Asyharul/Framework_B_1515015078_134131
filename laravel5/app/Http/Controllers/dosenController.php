<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\dosen;

class dosenController extends Controller
{
    public function awal()
    {
    	return "Hello dari DosenController";
    }
    public function tambah()
    {
    	return $this->simpan();
    
}
public function simpan()
{
	$dosen = new dosen();
	$dosen->nama = 'Muhammad Asyharul';
	$dosen->nip = '001';
	$dosen->alamat = 'perjuangan 3';
	$dosen->pengguna_id = '001';
	$dosen->save();
	return "data dengan nama {$dosen->nama} telah disimpan";
}
public function ket_dosen() {
	$keterangan = dosen::all();  //untuk menampilkan semua data 
	foreach ($keterangan as $ket) {  //panggilnya pakai foreach
	echo "Nama :" .$ket->nama;
	echo "<br>";
	echo "NIP :" .$ket->nip;
	echo "<br>";
	echo "Alamat :" .$ket->alamat;
	echo "<br>";
	echo "Di buat oleh :" .$ket->pengguna->username; 
	echo "<p>";} 
	}
}
