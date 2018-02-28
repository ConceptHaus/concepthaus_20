<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

use App\CodigoPromo;
use App\Mailing;
use App\Status;
use App\Motivos;
use App\Registros;
use App\NoSocio;

use App\Pivot_Models\PivoteMailing;
use App\Pivot_Models\PivoteStatus;
use App\Pivot_Models\PivoteMotivo;
use App\Pivot_Models\PivoteCodPromo;

use Mail;

class StatusController extends Controller
{

    public function __construct(){
        date_default_timezone_set('America/Mexico_City');
        $this->middleware('auth');

    }

    public function saveStatus(Request $request){

        $registro = Registros::where('id_registro','=',$request->id_registro)->first();
        $statusActual = PivoteStatus::where('id_registro','=',$request->id_registro)->first();

        if($request->new_status == 2){
            $statusActual->id_status = 2;
            $nosocio = new NoSocio;
            $nosocio->id_registro = $request->id_registro;
            $nosocio->no_socio = $request->no_socio;
            $nosocio->save();
            $statusActual->save();

            $user['correo'] = $registro['correo'];
            $user['no_socio'] = $request->no_socio;
            // Mailing confirmación de registro usuario
			Mail::send('emails.socio.user' ,$user, function ($contact) use ($user) {
				$contact->from('stcatalogo2@gmail.com', 'Salvaje Tentación');
				$contact->to($user['correo'], 'Socio Salvaje Tentación')->subject('Socio Salvaje Tentación');
			});

            return response('success_socio',200);
        }

        if($request->new_status == 3){
            
            $statusActual->id_status = 3;
            $motivo = new PivoteMotivo;
            $motivo->id_registro = $request->id_registro;
            $motivo->id_motivo = $request->id_motivo;
            $motivo->nota_motivo = $request->nota_motivo;
            $motivo->save();
            $statusActual->save();

            return response('success_no_viable',200);
        }



    }

    
            

}

