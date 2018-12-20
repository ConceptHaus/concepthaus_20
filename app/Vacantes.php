<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vacantes extends Model
{
  protected $table = 'vacantes';
  protected $primaryKey = 'id_vacante';
  protected $fillable = [
    'titulo',
    'id_area',
    'descripcion',
    'cv',
    'portafolio'
  ];

  public function postulados(){
    return $this->belongsTo('App\Postulados','id_vacante','id_vacante');
  }

  public function areas(){
    return $this->hasOne('App\Areas','id_area','id_area');
  }
}