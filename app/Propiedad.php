<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Propiedad extends Model
{
    protected $table = 'propiedades';

    protected $primaryKey = 'idPropiedad';

    protected $fillable = [
    	'direccion',
    	'latitud',
    	'longitud',
    	'superficieTotal',
    	'superficieUtil',
    	'created_at',
    	'updated_at',
        'urlVideo',
        'dormitorios',
        'baños',
        'bodegas',
        'estacionamiento',
        'cantidadPesos',
        'departamentosPisos',
        'numeroPisoUnidad',
        'bañoVisitas',
        'dormitorioBañoServicio',
        'jardin',
        'parrilla',
        'piscina',
        'terraza',
        'usoComercial',
        'idOrientacion',
        'precio',
        'idMoneda',
        'antiguedad',
        'datosOpcionales',
        'idUsuario',
        'fotoPortada'
    ];
}
