<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{

    protected $table = 'permissao_sistema';

    public function consultor(){

    	return $this->belongsTo('App/Consultor');

    }

}
