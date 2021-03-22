<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoComercial extends Model
{
    protected $table = 'tipos_comerciales';

    protected $primaryKey = 'idTipoComercial';

    protected $fillable = [
    	'idTipoComercial',
    	'nombreTipoComercial'
    ];
}
