<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

use App\Registros;
use App\Notas;
use App\MedioContacto;
use App\CodigoPromo;
use App\Pivot_Models\PivoteMedios;
use App\Pivot_Models\PivoteCodPromo;
use App\Pivot_Models\PivoteStatus;

use Mail;

class MediosController extends Controller{
    
    public function __construct(){
        date_default_timezone_set('America/Mexico_City');
        $this->middleware('auth');

    }

    public function saveNotaAndMedio(Request $request){

        $registro = Registros::where('id_registro','=',$request->id_registro)->first();
        $statusActual = PivoteStatus::where('id_registro','=',$request->id_registro)->first();
        $cupon = CodigoPromo::where('status','=',0)->first();

        if($request->correo == 1){
            $medio = new PivoteMedios;
            $medio->id_registro = $request->id_registro;
            $medio->id_medio_contacto = 1;
            $medio->save();

            // $codigoPromocional = new PivoteCodPromo;
            // $codigoPromocional->id_codigo_promo = $cupon['id_codigo_promo'];
            // $codigoPromocional->id_registro = $request->id_registro;
            // $codigoPromocional->save();

            // $cupon->status = 1;
            // $cupon->save();

            // $user['correo'] = $registro['correo'];
            // $user['no_cupon'] = $cupon['codigo_promo'];
            // // Mailing envío de cupón usuario
			// Mail::send('emails.promocional.user' ,$user, function ($contact) use ($user) {
			// 	$contact->from('stcatalogo2@gmail.com', 'Salvaje Tentación');
			// 	$contact->to($user['correo'], 'Salvaje Tentación')->subject('Salvaje Tentación');
			// });
        }
        if($request->telefono == 1){
            $medio = new PivoteMedios;
            $medio->id_registro = $request->id_registro;
            $medio->id_medio_contacto = 2;
            $medio->save();
        }
        if($request->whatsapp == 1){
            $medio = new PivoteMedios;
            $medio->id_registro = $request->id_registro;
            $medio->id_medio_contacto = 3;
            $medio->save();
        }
        if($request->nota){
            $nota = new Notas;
            $nota->nota = $request->nota;
            $nota->id_registro = $request->id_registro;
            $nota->save();
        }
        
        if($request->contacto == 0){

            if($request->status == 1){
                $statusActual->id_status = 5;
                $statusActual->save();
            }
            
        }

        return response('success',200);

    }
}
