<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seguridad extends Model
{
    protected $table = 'seguridades';

    protected $primaryKey = 'idSeguridad';

    protected $fillable = [
    	'nombreSeguridad'
    ];
}
