<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mailing extends Model
{
    protected $table = 'mailings';
    protected $primaryKey = 'id_mailing';
    protected $fillable = ['mailing'];
    
    public function pivot_mailing(){
        
        return $this->hasOne('App\Pivot_Models\PivoteMailing','id_mailing','id_mailing');
    
    }
}
