<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orientacion extends Model
{
    protected $table = 'orientaciones';

    protected $primaryKey = 'idOrientacion';

    protected $fillable = [
    	'nombreOrientacion'
    ];
}
