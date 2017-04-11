<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Jadwal_matakuliah;
use App\Dosen;
use App\Ruangan;
use App\Mahasiswa;
use App\Dosen_matakuliah;


class Jadwal_matakuliahController extends Controller
{
/*     public function tambah(){
        return $this->simpan();
    }
    public function simpan(){
        $jadwal_matakuliah = new Jadwal_matakuliah();
        $jadwal_matakuliah->mahasiswa_id = 1;
        $jadwal_matakuliah->ruangan_id = 1;
        $jadwal_matakuliah->dosen_matakuliah_id = 1;
        $jadwal_matakuliah->save();
        return "Data Jadwal matakuliah telah disimpan";
}
 */
public function jadwal_kulmhs() {
    $jadwal = jadwal_matakuliah::find(1);  //untuk menampilkan semua data
    echo "nama Mahasiswa :" .$jadwal->mahasiswa->nama;
    echo "<br>";
    echo " Berada Di Kelas :" .$jadwal->ruangan->title;
} 

    protected $informasi = 'Gagal melakukan aksi';

    public function awal()
    {
        $semuaJadwal_matakuliah = Jadwal_matakuliah::all();
        return view('jadwal_matakuliah.awal',compact('semuaJadwal_matakuliah'));
    }

    public function tambah()
    {
        $mahasiswa = new Mahasiswa;
        $ruangan = new Ruangan;
        $dosen_matakuliah = new Dosen_matakuliah;
        return view('jadwal_matakuliah.tambah',compact('mahasiswa','ruangan','dosen_matakuliah'));
    }


    public function simpan(Request $input)
    {
        
        $jadwal_matakuliah = new Jadwal_matakuliah($input->only('ruangan_id','dosen_matakuliah_id','mahasiswa_id'));

        if ($jadwal_matakuliah->save()) $this->informasi = "Jadwal Mahasiswa berhasil disimpan";
    
        return redirect('jadwal_matakuliah')->with(['informasi'=>$this->informasi]);
    }


    public function lihat($id)
    {
        $jadwal_matakuliah = Jadwal_matakuliah::find($id);
        return view('jadwal_matakuliah.lihat',compact('jadwal_matakuliah'));
    }   


    public function edit($id)
    {
        $jadwal_matakuliah = Jadwal_matakuliah::find($id);
        $mahasiswa = new Mahasiswa;
        $ruangan = new Ruangan;
        $dosen_matakuliah = new Dosen_matakuliah;
        return view('jadwal_matakuliah.edit',compact('mahasiswa','ruangan','dosen_matakuliah','jadwal_matakuliah'));
    }


    public function update($id, Request $input)
    {

        $jadwal_matakuliah = Jadwal_matakuliah::find($id);
        $jadwal_matakuliah->fill($input->only('ruangan_id','dosen_matakuliah_id','mahasiswa_id'));

         if($jadwal_matakuliah->save()) $this->informasi = 'Jadwal Mahasiswa berhasil diperbaharui';
        
        return redirect('jadwal_matakuliah')->with(['informasi'=>$this->informasi]);    
    }


    public function hapus($id, Request $input)
    {
        $jadwal_matakuliah = Jadwal_matakuliah::find($id);

            if($jadwal_matakuliah->delete()) $this->informasi = 'Jadwal Mahasiswa berhasil dihapus';
            return redirect('jadwal_matakuliah')-> with(['informasi'=>$this->informasi]);
        
    }   
    }
