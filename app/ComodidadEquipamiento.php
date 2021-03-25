<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ComodidadEquipamiento extends Model
{
    protected $table = 'comodidades_equipamiento';

    protected $primaryKey = 'idComodidadEquipamiento';

    protected $fillable = [
    	'nombreComodidadEquipamiento'
    ];
}
