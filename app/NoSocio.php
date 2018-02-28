<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NoSocio extends Model
{
    protected $table = 'nosocios';
    protected $primaryKey = 'id_nosocio';
    protected $fillable = ['id_registro','no_socio','compra'];
    
    public function registro(){
        return $this->hasOne('App\Registros','id_registro','id_registro');
     }
}
