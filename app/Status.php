<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $table = 'status';
    protected $primaryKey = 'id_status';
    protected $fillable = ['status'];


    public function pivot_status(){
        return  $this->hasOne('App\Pivot_Models\PivoteStatus','id_status','id_status');
     }
}
