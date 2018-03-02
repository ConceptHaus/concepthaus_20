<?php

namespace App\Http\Controllers;
use Carbon\Carbon;

use App\Registros;
use App\Ubicacion;
use App\FechaRegistro;
use App\CodigoRegistro;
use App\Pivot_Models\PivoteStatus;
use App\Pivot_Models\PivoteForms;

use Illuminate\Http\Request;

use Validator;
use Mail;

class RegistroController extends Controller {

	// ===================== Validadores ====================
    protected function validatorRegistro(array $data){
        return Validator::make($data, [
            'nombre'     => 'required',
						'correo'     => 'required|email|unique:registros',
            'telefono'   => 'required',
						'empresa'     => 'required',
						'mensaje'     => 'required',
        ]);
	}
	
	// ===================== Generador de código ====================
	public  function quickRandom($length = 6){
        $pool = '0123456789abcdefghijklmnopqrstuvwxyz';
        return substr(str_shuffle(str_repeat($pool, $length)), 0, $length);
    }
	
	// ===================== Almacena datos registro ====================
    public function saveDataRegistro(Request $request) {
		date_default_timezone_set('America/Mexico_City');
		$input = $request->all();
		$Validator = $this->validatorRegistro($input);
		$no_codigo = self::quickRandom();

		if($Validator->passes()){

			// Formatos fecha
			$dia = new Carbon();
			$dia = $dia->format('l');

			$mes = new Carbon();
			$mes = $mes->format('m');

			$hora = new Carbon();
			$hora = $hora->format('H:i');

			$fecha = new Carbon();
			$fecha = $fecha->format('Y/m/d');

			$registro = new Registros;
			$registro -> nombre     = $request -> nombre;
			$registro -> correo     = $request -> correo;
			$registro -> telefono   = $request -> telefono;
			$registro -> empresa   = $request -> empresa;
			$registro -> mensaje   	= $request -> mensaje;
			$registro -> fuente   	= $request -> fuente;
			$registro -> save();

			$user = $registro->toArray();

			// $ubicacion = new Ubicacion;
			// $ubicacion -> id_registro = $user['id_registro'];
			// $ubicacion -> ciudad      =  $request->ciudad;
			// $ubicacion -> estado      =  $request->estado;
			// $ubicacion -> save();

			$fechas_registro =  new FechaRegistro;
			$fechas_registro -> id_registro 	= $user['id_registro'];
			$fechas_registro -> dia      		= $dia;
			$fechas_registro -> mes      		= $mes;
			$fechas_registro -> hora      		= $hora;
			$fechas_registro -> fecha_completa  = $fecha;
			$fechas_registro -> save();

			$status = new PivoteStatus;
			$status -> id_status   =  1;
			$status -> id_registro =  $user['id_registro'];
			$status -> save();

			$codigo = new CodigoRegistro;
			$codigo -> id_registro   	=  $user['id_registro'];
			$codigo -> codigo_registro 	=  $no_codigo;
			$codigo -> save();

			$formulario = new PivoteForms;
			$formulario -> id_registro =  $user['id_registro'];
			$formulario -> tipo 	   =  $request->tipo;
			$formulario -> save();
	
			$user['correo'] = $request -> correo;
			// $user['ciudad'] = $request->ciudad;
			// $user['estado'] = $request->estado;
			$user['codigo'] = $no_codigo;

			// Mailing confirmación de registro usuario
			Mail::send('emails.registro.user' ,$user, function ($contact) use ($user) {
				$contact->from('contacto@concepthaus.mx', 'Concept Haus');
				$contact->to($user['correo'], 'Registro Concept Haus')->subject('Registro Concept Haus');
			});

			// Mailing Administrador nuevo registro
			Mail::send('emails.registro.admin', $user, function($contact) use ($user){
				$contact->from('contacto@concepthaus.mx','Concept Haus');
				$contact->to('contacto@concepthaus.mx','Concept Haus')->subject('Nuevo Concept Haus');
			});
			
			$json['success'] = "Datos guardados";
			return json_encode($json['success']);
		}

		dd($Validator->errors());
		
		$json['errors'] = $Validator->errors();
		return json_encode($json['errors']);
	}
	
}
