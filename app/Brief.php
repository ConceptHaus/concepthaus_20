<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brief extends Model
{
    protected $table = 'brief';
    protected $primaryKey = 'id';
    protected $fillable = ['nombre','pregunta_uno', 'pregunta_dos', 'pregunta_tres', 'pregunta_cuatro', 'pregunta_cinco', 'pregunta_seis', 'pregunta_siete', 'pregunta_ocho', 'pregunta_nueve', 'pregunta_diez', 'pregunta_once'];
}
