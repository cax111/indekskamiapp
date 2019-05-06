<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class crudUser extends Model
{
    protected $table = "tb_user";
    protected $primaryKey = "id_user";

    public function assessment(){
    	return $this->belongsTo('App\crudAssessment', $this->primaryKey);
    }
}
