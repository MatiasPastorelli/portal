<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CaracteristicaCategoria extends Model
{
    protected $table = 'caracteristicas_categorias';

    protected $primaryKey = 'idCaracteristicaCategoria';

    protected $fillable = [
    	'idCaracteristica',
    	'idTipoCaracteristica',
        'idCategoria',
        'idTipoComercial'
    ];
}
