<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Postulados extends Model
{
    protected $table = 'postulados';
    protected $primaryKey = 'id_postulado';
    protected $fillable = [
      'nombre',
      'apellido',
      'correo',
      'url_cv',
      'url_portafolio',
      'id_vacante'
    ];

    public function vacantes(){
      return $this->hasMany('App\vacantes','id_vacante','id_vacante');
    }
}
