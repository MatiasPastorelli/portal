<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Oferta extends Model
{
    protected $table = 'ofertas';

    protected $primaryKey = 'idOferta';

    protected $fillable = [
    	'nombreOferta',
        'valorOferta'
    ];
}
