<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class estandar extends Model 
{
    protected $table = 'estandar';
    protected $fillable = ['name','componente_id'];
}
