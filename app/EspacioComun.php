<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EspacioComun extends Model
{
    protected $table = 'espacios_comunes';

    protected $primaryKey = 'idEspacioComun';

    protected $fillable = [
    	'nombreEspacioComun'
    ];
}
