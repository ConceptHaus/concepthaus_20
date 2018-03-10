<?php

namespace App\Pivot_Models;

use Illuminate\Database\Eloquent\Model;

class PivoteServicios extends Model
{
    protected $table = 'pivot_servicios';
    protected $primaryKey = 'id_pivot_servicio';
    protected $fillable = ['id_registro','servicio'];
    
    public function registro(){
        return $this->belongsTo('App\Registros','id_registro','id_registro');
     }
}
