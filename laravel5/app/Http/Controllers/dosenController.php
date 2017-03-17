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
}
