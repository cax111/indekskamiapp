<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class crudJudulInstrument extends Model
{
    protected $table = "tb_judul_instrument";
    protected $primaryKey = "id_judul_instrument";
    public $timestamps = false;

    public function instrument(){
    	return $this->hasMany('App\crudJudulInstrument', $this->primaryKey);
    }
}
