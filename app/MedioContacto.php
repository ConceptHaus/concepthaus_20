<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MedioContacto extends Model
{
    protected $table = 'medios_contacto';
    protected $primaryKey = 'id_medio_contacto';
    protected $fillable = ['medio'];
    
    public function pivot_medios(){
        
        return $this->hasMany('App\Pivot_Models\PivoteMedios','id_medio_contacto','id_medio_contacto');
     }
}
