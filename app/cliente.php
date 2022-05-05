<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cliente extends Model
{
    protected  $primaryKey = 'IDCLIENTE';

    public function getCompras()
    {
        return $this->hasMany('App\documento', 'IDCLIENTE', 'IDCLIENTE');
    }
}
