<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class gpa extends Model
{
    protected $table = 'gpa';
    protected $fillable = ['grado_id',"semana_id","area_id","user_id"];
}