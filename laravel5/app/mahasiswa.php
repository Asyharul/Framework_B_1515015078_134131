<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class mahasiswa extends Model
{
    protected $table = 'mahasiswa';
    protected $fillable = ['nama','nim','alamat','pengguna_id'];
    public function Pengguna(){
    	return $this->belongsTo(Pengguna::class);
    }
    public function jadwal_mahasiswa()
{
	return  $this->hasMany(Jadwal_matakuliah::class); //one to Many dari Mahasiswa (one) ke Jadwal matakuliah (many)
}
}
