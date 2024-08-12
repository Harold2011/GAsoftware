<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class cronograma extends Model
{
    protected $table = 'cronograma';
    protected $fillable = ['unididactica_id',"componente_id","estandar_id","competencia_id","desempeno_id","afirmacion_id","gpa_id","estado_id"];
}