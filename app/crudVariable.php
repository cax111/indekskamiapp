<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class crudVariable extends Model
{
    protected $table = "tb_variable";
    protected $primaryKey = "id_variable";
    public $timestamps = false;

    public function instrument(){
    	return $this->hasMany('App\crudInstrument', $this->primaryKey);
    }
}
