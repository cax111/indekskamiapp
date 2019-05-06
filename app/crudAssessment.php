<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class crudAsessment extends Model
{
   	protected $table = "tb_asessment";
   	protected $primaryKey = 'id_asessment';

   	public function instrument(){
   		return $this->hasMany('App\crudInstrument', $this->primaryKey);
   	}
   	public function user(){
   		return $this->hasMany('App\crudUser', $this->primaryKey);
   	}
}
