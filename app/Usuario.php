<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $table = 'usuarios';

    protected $primaryKey = 'idUsuario';

    protected $fillable = [
    	'emailUsuario',
    	'nombreUsuario',
    	'apellidoUsuario',
    	'rutUsuario',
    	//'idRegion',
    	//'idPais',
    	'tokenCorto',
    	//'tokenLargo',
    	//'telefono',
    	//'idTipoUsuario',
    	'aceptaTerminos',
        'passwordUsuario',
    	'cuentaActivada'
    ];
}
