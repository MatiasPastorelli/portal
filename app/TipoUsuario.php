<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoUsuario extends Model
{
    protected $table = 'tipos_usuarios';

    protected $primaryKey = 'idTipo_usuario';

    protected $fillable = [
    	'nombreTipo_usuario',
    ];
}
