<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OfertaPlan extends Model
{
    protected $table = 'ofertas_planes';

    protected $primaryKey = 'idOfertaPlan';

    protected $fillable = [
    	'idOferta',
        'idPlan'
    ];
}
