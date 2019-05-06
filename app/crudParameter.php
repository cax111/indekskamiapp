<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class crudParameter extends Model
{
	protected $table = "tb_parameter";
  protected $primaryKey = 'id_parameter';

	public function detailInstrument(){
		return $this->hasMany('App\crudDetailInstrument', $this->primaryKey);
	}
}
