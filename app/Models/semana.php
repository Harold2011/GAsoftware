<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class semana extends Model
{
    protected $table = 'semana';
    protected $fillable = ['name'];
}