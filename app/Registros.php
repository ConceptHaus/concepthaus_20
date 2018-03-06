<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Registros extends Model {
    public $table = 'registros';
    
    protected $primaryKey = 'id_registro';
    protected $fillable = [
        'nombre',
        'correo',
        'telefono',
        'empresa',
        'proyecto',
        'mensaje',
        'fuente',
    ];

    public function pivot_motivos(){
        return $this->hasOne('App\Pivot_Models\PivoteMotivo','id_registro','id_registro');
    }

    public function pivot_cod_promo(){
        return $this->hasOne('App\Pivot_Models\PivoteCodPromo','id_registro','id_registro');
    }

    public function pivot_mailing(){
        return $this->hasOne('App\Pivot_Models\PivoteMailing','id_registro','id_registro');
    }

    public function pivot_medios(){
        return $this->hasMany('App\Pivot_Models\PivoteMedios','id_registro','id_registro');
    }
    public function pivot_status(){
        return $this->hasOne('App\Pivot_Models\PivoteStatus','id_registro','id_registro');
    }

    public function ubicacion(){
        return $this->hasOne('App\Ubicacion','id_registro','id_registro');
    }

    public function no_socio(){
        return $this->hasOne('App\NoSocio','id_registro','id_registro');
    }

    public function codigos_registros(){
        return $this->hasOne('App\CodigoRegistro','id_registro','id_registro');
    }

    public function notas(){
        return $this->hasMany('App\Notas','id_registro','id_registro');
    }

    public function fecha_registro(){
        return $this->hasOne('App\FechaRegistro','id_registro','id_registro');
    }

    public function scopeGetAllRegistros($query){
        return $query->join('pivot_status', 'registros.id_registro', '=', 'pivot_status.id_registro')
        ->with('ubicacion')
        ->with('no_socio')
        ->with('codigos_registros')
        ->with('notas')
        ->with('fecha_registro')
        ->with('pivot_motivos.motivo')
        ->with('pivot_cod_promo.codigos_promo')
        ->with('pivot_mailing.mailing')
        ->with('pivot_medios.medios_contacto')
        ->with('pivot_status.status')
        ->selectRaw('registros.*, pivot_status.id_status')
        ->get();
    }

    public function scopeGetLastestRegistros($query){
        return $query->with('ubicacion')
        ->with('no_socio')
        ->with('codigos_registros')
        ->with('notas')
        ->with('fecha_registro')
        ->with('pivot_motivos.motivo')
        ->with('pivot_cod_promo.codigos_promo')
        ->with('pivot_mailing.mailing')
        ->with('pivot_medios.medios_contacto')
        ->with('pivot_status.status')
        ->orderBy('id_registro', 'DESC')
        ->take(10)
        ->get();
    }

    public function scopeGetOneRegistro($query,$id){
        return $query->with('ubicacion')
        ->with('no_socio')
        ->with('codigos_registros')
        ->with('notas')
        ->with('fecha_registro')
        ->with('pivot_motivos.motivo')
        ->with('pivot_cod_promo.codigos_promo')
        ->with('pivot_mailing.mailing')
        ->with('pivot_medios.medios_contacto')
        ->with('pivot_status.status')
        ->where('id_registro','=',$id);
    }

    public function scopeGetFilterDate($query,$fecha_inicial ,$fecha_final){
        return $query->join('fecha_registro', 'registros.id_registro', '=', 'fecha_registro.id_registro')
        ->whereBetween('fecha_registro.fecha_completa',[$fecha_inicial,$fecha_final])
        ->with('ubicacion')
        ->with('no_socio')
        ->with('codigos_registros')
        ->with('notas')
        ->with('fecha_registro')
        ->with('pivot_motivos.motivo')
        ->with('pivot_cod_promo.codigos_promo')
        ->with('pivot_mailing.mailing')
        ->with('pivot_medios.medios_contacto')
        ->with('pivot_status.status')
        ->orderBy('registros.id_registro')
        ->get(); 
    }
}
