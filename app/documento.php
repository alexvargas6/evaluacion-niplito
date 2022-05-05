<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class documento extends Model
{

    protected  $primaryKey = 'IDCODIGO';

    public function getDetalles()
    {
        return $this->hasMany('App\documentorenglon', 'IDCODIGO', 'IDCODIGO');
    }
}
