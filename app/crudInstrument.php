<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class crudInstrument extends Model
{
	protected $table = "tb_instrument";
  protected $primaryKey = 'id_instrument';
  public $timestamps = false;

	public function asessment(){
		return $this->hasMany('App\crudAsessement', $this->primaryKey);
	}
	public function detailInstrument(){
		return $this->hasMany('App\crudDetailInstrument', $this->primaryKey);
	}
	public function judulInstrument(){
		return $this->belongsTo('App\crudJudulInstrument', $this->primaryKey);
	}
	public function variable(){
		return $this->belongsTo('App\crudVariable', $this->primaryKey);
	}
}
