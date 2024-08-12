<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class indicadorDesempeño extends Model 
{
    protected $table = 'afirmacion';
    protected $fillable = ['name','desempeno_id'];
}
