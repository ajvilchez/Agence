<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Consultor extends Model
{

    protected $table = 'cao_usuario';

    protected $primaryKey = 'co_usuario'

    public function permission(){

    	return $this->hasMany('App/Permission');
    	
    }

}
