<?php

namespace App\Pivot_Models;

use Illuminate\Database\Eloquent\Model;

class PivoteMedios extends Model
{
    protected $table = 'pivot_medios';
    protected $primaryKey = 'id_pivot_medio';
    protected $fillable = ['id_registro','id_medio_contacto'];
    
    public function registro(){
        return $this->belongsTo('App\Registros','id_registros','id_registros');
     }

     public function medios_contacto(){
        return  $this->belongsTo('App\MedioContacto', 'id_medio_contacto','id_medio_contacto');
     }
}
