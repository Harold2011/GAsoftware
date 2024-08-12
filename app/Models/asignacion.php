<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class asignacion extends Model
{
    protected $table = 'asignacion';
    protected $fillable = ['area_id','profesor_id'];
}
