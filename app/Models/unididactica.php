<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class unididactica extends Model
{
    protected $table = 'unididactica';
    protected $fillable = ['id','name', 'grado_id', 'area_id'];
}
