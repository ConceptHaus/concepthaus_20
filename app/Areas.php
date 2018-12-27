<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Areas extends Model
{
    protected $table = 'areas';
    protected $primaryKey = 'id_area';
    protected $fillable = [
      'area'
    ];

    public function vacantes(){
      return $this->belongsTo('App\Vacantes','id_area','id_area');
    }

    public function scopeGetAllAreas($query){
      return $query->with('vacantes')->get();
    }
}
