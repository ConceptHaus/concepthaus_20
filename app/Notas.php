<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notas extends Model
{
    protected $table = 'notas';
    protected $primaryKey = 'id_notas';
    protected $fillable = ['id_registro','nota'];
    public function registro(){
        return $this->belongsTo('App\Registros','id_registro','id_registro');
     }
}
