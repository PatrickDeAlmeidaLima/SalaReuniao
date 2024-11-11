<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EspacoCafe extends Model
{
    protected $table = 'espaco_cafes'; 

    protected $fillable = ['nome', 'lotacao'];
}
