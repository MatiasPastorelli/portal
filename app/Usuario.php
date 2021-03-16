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
    	//'idComuna',
    	//'idProvincia',
    	//'idRegion',
    	//'idPais',
    	//'tokenCorto',
    	//'tokenLargo',
    	//'telefono',
    	//'idTipoUsuario',
    	//'idCliente',
        'passwordUsuario',
    	//'cuentaActivada'
    ];
}
