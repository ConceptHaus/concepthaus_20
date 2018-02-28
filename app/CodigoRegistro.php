<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CodigoRegistro extends Model
{
    protected $table = 'codigos_registros';
    protected $primaryKey = 'id_codigo_registro';
    protected $fillable = ['id_registro','codigo_registro'];
    
    public function registro(){
        return $this->belongsTo('App\Registros','id_registro','id_registro');
     }
    
    
}
