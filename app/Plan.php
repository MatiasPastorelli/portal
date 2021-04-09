<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    protected $table = 'planes';

    protected $primaryKey = 'idPlan';

    protected $fillable = [
    	'nombrePlan',
        'valorPlan'
    ];
}
