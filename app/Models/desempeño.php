<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class desempeño extends Model 
{
    protected $table = 'desempeno';
    protected $fillable = ['name','competencia_id'];
}
