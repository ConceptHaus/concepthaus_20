<?php

namespace App\Pivot_Models;

use Illuminate\Database\Eloquent\Model;

class PivoteMotivo extends Model
{
    protected $table = 'pivot_motivos';
    protected $primaryKey = 'id_pivot_motivo';
    protected $fillable = ['id_motivo','id_registro'.'nota_motivo'];
    
    public function motivo(){
        return  $this->belongsTo('App\Motivo','id_motivo','id_motivo');
    }
    
    public function registro(){
        return  $this->belongsTo('App\Registros','id_registro','id_registro');
    }    
}
