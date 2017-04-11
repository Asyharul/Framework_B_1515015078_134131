<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Mahasiswa;
use App\Pengguna;

class MahasiswaController extends Controller
{
    protected $informasi = 'Gagal melakukan aksi';

   public function awal()
    {
        $semuaMahasiswa = Mahasiswa::all();
        return view('mahasiswa.awal',compact('semuaMahasiswa'));
    }


    public function tambah()
    {
        return view('mahasiswa.tambah');
    }

    
    public function simpan(Request $input)
    {

    $pengguna = new Pengguna($input->only('username','password'));

    if ($pengguna->save()) {
    $mahasiswa = new Mahasiswa;
    $mahasiswa->nama = $input->nama;
    $mahasiswa->nim = $input->nim;
    $mahasiswa->alamat = $input->alamat;

    if ($pengguna->mahasiswa()->save($mahasiswa)) $this->informasi = "Berhasil simpan data";
    }
    return redirect('mahasiswa')-> with(['informasi'=>$this->informasi]);
    }


    public function edit($id)
    {
        $mahasiswa = Mahasiswa::find($id);
        return view('mahasiswa.edit')->with(array('mahasiswa'=>$mahasiswa));
    }

    public function lihat($id)
    {
        $mahasiswa = Mahasiswa::find($id);
        return view('mahasiswa.lihat')->with(array('mahasiswa'=>$mahasiswa));
    }


   public function update($id, Request $input)
    {

    $mahasiswa = Mahasiswa::find($id);
    $mahasiswa->nama = $input->nama;
    $mahasiswa->nim = $input->nim;
    $mahasiswa->alamat = $input->alamat;
    $mahasiswa->save();

       // $pengguna = new Pengguna($input->only('username'));
    if(!is_null($input->username)) {
        $pengguna = $mahasiswa->pengguna->fill($input->only('username'));
        if(!empty($input->password)) $pengguna->password = $input->password;
    if($pengguna->save()) $this->informasi = 'Berhasil perbaharui data';
    }else{
    $this->informasi = 'Berhasil perbaharui data';
}

    return redirect('mahasiswa')->with(['informasi'=> $this->informasi]);
    }


     public function hapus($id)
    {
        $mahasiswa = Mahasiswa::find($id);
        if($mahasiswa->pengguna()->delete()){
            if($mahasiswa->delete()) $this->informasi = 'Berhasil hapus data';
        }
            return redirect('mahasiswa')-> with(['informasi'=>$this->informasi]);
        
    }  
}
   /*public function awal()
    {
        $semuaMahasiswa = Mahasiswa::all();
        return view('mahasiswa.awal',compact('semuaMahasiswa'));
    }

    public function tambah()
    {
        return view('mahasiswa.tambah');
    }

    public function simpan(Request $input)
    {

    $mahasiswa = new mahasiswa;
    $mahasiswa->nama = $input->nama;
    $mahasiswa->nim = $input->nim;
    $mahasiswa->alamat = $input->alamat;
    $mahasiswa->pengguna_id = $input->pengguna_id;
    $informasi = $mahasiswa->save() ? 'Berhasil simpan data' : 'Gagal simpan data';
    return redirect('mahasiswa')->with(['informasi'=>$informasi]);
    
    }


    public function edit($id)
    {
        $mahasiswa = Mahasiswa::find($id);
        return view('mahasiswa.edit')->with(array('mahasiswa'=>$mahasiswa));
    }

    public function lihat($id)
    {
        $mahasiswa = Mahasiswa::find($id);
        return view('mahasiswa.lihat')->with(array('mahasiswa'=>$mahasiswa));
    }

   public function update($id, Request $input)
    {
         $mahasiswa = mahasiswa::find($id);
    $mahasiswa->nama = $input->nama;
    $mahasiswa->nim = $input->nim;
    $mahasiswa->alamat = $input->alamat;
    $mahasiswa->pengguna_id = $input->pengguna_id;
    $informasi = $mahasiswa->save() ? 'Berhasil update data' : 'Gagal update data';
    return redirect('mahasiswa')->with(['informasi'=>$informasi]);
    }

     public function hapus($id)
    {
        $mahasiswa = Mahasiswa::find($id);
        if($mahasiswa->pengguna()->delete()){
            if($mahasiswa->delete()) $this->informasi = 'Berhasil hapus data';
            return redirect('mahasiswa')-> with(['informasi'=>$this->informasi]);
        }
    }
}

/*namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\mahasiswa;
use App\Pengguna;*/





/*class mahasiswaController extends Controller
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
	}}}*/

