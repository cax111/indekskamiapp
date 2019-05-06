<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class login extends Authenticatable
{
    protected $table = "tb_user";
	protected $primaryKey = 'id_user';

}
