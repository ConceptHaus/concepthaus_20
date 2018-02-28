<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CodigoPromo extends Model
{
    protected $table = 'codigos_promo';
    protected $primaryKey = 'id_codigo_promo';
    protected $fillable = ['codigo_promo','status'];
    
    public function pivot_cod_promo(){
        return $this->hasOne('App\Pivot_Models\PivoteCodPromo','id_codigo_promo','id_codigo_promo');
     }
}
