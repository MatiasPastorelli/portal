<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Caracteristica extends Model
{
    protected $table = 'caracteristicas';

    protected $primaryKey = 'idCaracteristica';

    protected $fillable = [
    	'nombreCaracteristica'
    ];
}
