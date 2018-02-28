<?php

namespace App\Pivot_Models;

use Illuminate\Database\Eloquent\Model;

class PivoteCodPromo extends Model
{
    protected $table = 'pivot_cod_promo';
    protected $primaryKey = 'id_pivot_cod_promo';
    protected $fillable = ['id_codigo_promo','id_registro'];
    
    public function registro(){
        return $this->belongsTo('App\Registros', 'id_registro','id_registro');
     }
    
    public function codigos_promo(){
        return $this->belongsTo('App\CodigoPromo','id_codigo_promo','id_codigo_promo');
    }
}
