<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\dosen_matakuliah;
use App\matakuliah;
use App\dosen;
class dosen_matakuliahController extends Controller
{
    protected $informasi = 'Gagal melakukan aksi';

    public function awal()
    {
        $semuaDosen_matakuliah = Dosen_matakuliah::all();
        return view('dosen_matakuliah.awal',compact('semuaDosen_matakuliah'));
    }
    

    public function tambah()
    {
        $dosen = new Dosen;
        $matakuliah = new Matakuliah;
        return view('dosen_matakuliah.tambah',compact('dosen','matakuliah'));
    }


    public function simpan(Request $input)
    {
        $dosen_matakuliah = new Dosen_matakuliah($input->only('dosen_id','matakuliah_id'));

        if ($dosen_matakuliah->save()) $this->informasi = "Jadwal Dosen berhasil disimpan";

        return redirect('dosen_matakuliah')->with(['informasi'=>$this->informasi]);
    }


    public function lihat($id)
    {
        $dosen_matakuliah = Dosen_matakuliah::find($id);
        return view('dosen_matakuliah.lihat',compact('dosen_matakuliah'));
    }   


    public function edit($id)
    {
        $dosen_matakuliah = Dosen_matakuliah::find($id);
        $dosen = new Dosen;
        $matakuliah = new Matakuliah;
        return view('dosen_matakuliah.edit',compact('dosen','matakuliah','dosen_matakuliah'));
    }


    public function update($id, Request $input)
    {

        $dosen_matakuliah = Dosen_matakuliah::find($id);
        $dosen_matakuliah->fill($input->only('dosen_id','matakuliah_id'));

         if($dosen_matakuliah->save()) $this->informasi = 'Jadwal Dosen berhasil diperbaharui';
        
        return redirect('dosen_matakuliah')->with(['informasi'=>$this->informasi]); 
    }


    public function hapus($id, Request $input)
    {
        $dosen_matakuliah = Dosen_matakuliah::find($id);

            if($dosen_matakuliah->delete()) $this->informasi = 'Jadwal Dosen berhasil dihapus';
            return redirect('dosen_matakuliah')-> with(['informasi'=>$this->informasi]);
        
    }  
}
    /*public function awal()
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
}*/
