<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Propiedad extends Model
{
    protected $table = 'propiedades';

    protected $primaryKey = 'idPropiedad';

    protected $fillable = [
    	'nombrepropiedad',
    	'direccionPropiedad',
    	'numeroPropiedad',
    	'blockPropiedad',
    	'urlVideoPropiedad',
    	'idCategoria',
    	'idTipo_comercial'
    ];
}
