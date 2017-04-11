<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class dosen_matakuliah extends Model
{
    protected $table = 'dosen_matakuliah'; 
	protected $guarded =['id'];

   	public function dosen(){ 
       return $this->belongsTo(Dosen::class);
	  }

	 public function jadwal_matakuliah(){

       return $this->hasMany(Jadwal_matakuliah::class); 
    }

   public function matakuliah(){ 
       return $this->belongsTo(Matakuliah::class); 
    }

     public function listDosendanMatakuliah(){
        $out = [];
        foreach ($this->all() as $dsnMtk) {
            $out[$dsnMtk->id] = "{$dsnMtk->dosen->nama} (Matakuliah {$dsnMtk->matakuliah->title})";
        }
    return $out;
}
}
    /*protected $table = 'dosen_matakuliah';
    protected $fillable = ['dosen_id','matakuliah_id'];

    public function dosen(){
	return $this->BelongsTo(dosen::class);
	}	
	public function matakuliah(){
	return $this->belongsTo(matakuliah::class);
	}	
	public function jadwal_matakuliah(){
	return $this->HasMany(jadwal_matakuliah::class);
	}
}*/
