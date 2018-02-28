<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ubicacion extends Model
{
    protected $table = 'ubicaciones';
    protected $primaryKey = 'id_ubicacion';
    protected $fillable = ['id_registro','estado','ciudad'];
    
    public function registro(){
        return $this->belongsTo('App\Registros','id_registro','id_registro');
     }
}
