<?php

namespace App\Pivot_Models;

use Illuminate\Database\Eloquent\Model;

class PivoteStatus extends Model
{
    protected $table = 'pivot_status';
    protected $primaryKey = 'id_pivot_status';
    protected $fillable = ['id_status','id_registro'];
    
    public function registro(){
        return $this->belongsTo('App\Registros','id_registro','id_registro');
     }

     public function status(){
        return  $this->belongsTo('App\Status','id_status','id_status');
    }
}
