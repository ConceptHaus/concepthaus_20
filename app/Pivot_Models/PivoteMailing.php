<?php

namespace App\Pivot_Models;

use Illuminate\Database\Eloquent\Model;

class PivoteMailing extends Model
{
    protected $table = 'pivot_mailing';
    protected $primaryKey = 'id_pivot_mailing';
    protected $fillable = ['id_mailing','id_registro'];
    
    public function registro(){
        return $this->belongsTo('App\Registros','id_registro','id_registro');
     }
    
    public function mailing(){
        return $this->belongsTo('App\Mailing','id_mailing','id_mailing');
    }
}
