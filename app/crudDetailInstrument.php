<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class crudDetailInstrument extends Model
{
    protected $table = "tb_detail_instrument";
    protected $primaryKey = "id_detail_instrument";
    public $timestamps = false;
    public function instrument(){
    	return $this->belongsTo('App\crudInstrument', $this->primaryKey);
    }
    public function parameter(){
    	return $this->belongsTo('App\crudParameter', $this->primaryKey);
    }
}
