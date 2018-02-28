<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Motivo extends Model
{
    protected $table = 'motivos';
    protected $primaryKey = 'id_motivo';
    protected $fillable = ['motivo'];
    
    public function pivot_motivos(){
        return $this->hasMany('App\Pivot_Models\PivoteMotivo','id_motivo','id_motivo');
    }
}
