<?php

namespace App\Pivot_Models;

use Illuminate\Database\Eloquent\Model;

class PivoteForms extends Model
{
    protected $table = 'pivot_forms';
    protected $primaryKey = 'id_pivot_forms';
    protected $fillable = ['id_registro','tipo'];
    
    public function registro(){
        return $this->belongsTo('App\Registros','id_registro','id_registro');
     }
}
