<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlanPropiedad extends Model
{
    protected $table = 'planes_propiedades';

    protected $primaryKey = 'idPlanPropiedad';

    protected $fillable = [
    	'idPlan',
        'idPropiedad',
        'valorPlan',
        'fechaVencimientoPlan'
    ];
}
