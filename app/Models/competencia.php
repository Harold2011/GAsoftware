<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class competencia extends Model 
{
    protected $table = 'competencia';
    protected $fillable = ['name','estandar_id'];
}
