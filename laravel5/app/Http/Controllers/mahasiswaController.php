<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\mahasiswa;
use App\Pengguna;
class mahasiswaController extends Controller
{
    public function awal()
    {
    	return "Hello dari mahasiswaController";
    }
    public function tambah()
    {
    	return $this->simpan();
    
}
public function simpan()
{
	$mahasiswa = new mahasiswa();
	$mahasiswa->nama = 'Muhammad Asyharul';
	$mahasiswa->nim = '1515015078';
	$mahasiswa->alamat = 'perjuangan 33';
	$mahasiswa->pengguna_id = '01';
	$mahasiswa->save();
	return "data dengan nama {$mahasiswa->nama} telah disimpan";
}
public function mahasiswa()
{
	$mahasiswa = mahasiswa::all();   //untuk menampilkan semua data
		foreach($mahasiswa as $mhs){   //memanggilnya memakai foreach
		echo "Nama: ".$mhs->nama;    //akan menampilkan namanya
		echo "<br>";
		echo "Username: ".$mhs->pengguna->username; //akan menampikan username dari pengguna tersebut
		echo "<br>";
		echo "<br>";
	}}}