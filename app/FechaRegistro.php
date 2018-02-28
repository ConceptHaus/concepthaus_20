<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FechaRegistro extends Model
{
    protected $table = 'fecha_registro';
    protected $primaryKey = 'id_fecha_registro';
    protected $fillable = ['id_registro','dia','mes','hora','completa'];
    
    public function registro(){
        return $this->belongsTo('App\Registros','id_registro','id_registro');
     }
}
