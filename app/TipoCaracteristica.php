<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoCaracteristica extends Model
{
    protected $table = 'tipoCategorias';

    protected $primaryKey = 'idTipoCategoria';

    protected $fillable = [
    	'nombreTipoCategoria'
    ];
}
