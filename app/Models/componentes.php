<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class componentes extends Model 
{
    protected $table = 'componente';
    protected $fillable = ['name','unididactica_id'];
}