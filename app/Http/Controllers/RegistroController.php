<?php

namespace App\Http\Controllers;
use Carbon\Carbon;

use App\Registros;
use App\Ubicacion;
use App\FechaRegistro;
use App\CodigoRegistro;
use App\Brief;
use App\Pivot_Models\PivoteStatus;
use App\Pivot_Models\PivoteForms;
use App\Pivot_Models\PivoteServicios;
use Telegram\Bot\FileUpload\InputFile;
use Telegram\Bot\Laravel\Facades\Telegram;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use Emoji;
use PDF;

use App\Vacantes;
use App\Postulados;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\UploadFile;
use DB;


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

	protected function validatorRegistroLead(array $data){
        return Validator::make($data, [
            'nombre'     => 'required',
			'correo'     => 'email',
			'empresa'    => 'required',
			'mensaje'    => 'required',
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
			$registro -> empresa    = $request -> empresa;
			$registro -> mensaje   	= $request -> mensaje;
			$registro -> fuente   	= $request -> fuente;
			$registro -> save();

			$user = $registro->toArray();

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

			$serviciosArray = $request->servicios;
			foreach ($serviciosArray as $servicio) {
				$servicios = new PivoteServicios;
				$servicios -> id_registro =  $user['id_registro'];
				$servicios -> servicio    =  $servicio;
				$servicios -> save();
			}

			$user['correo'] = $request -> correo;
			// $user['ciudad'] = $request->ciudad;
			// $user['estado'] = $request->estado;
			$user['codigo'] = $no_codigo;

			// Mailing confirmación de registro usuario
			Mail::send('emails.registro.user' ,$user, function ($contact) use ($user) {
				$contact->from('contacto@concepthaus.mx', 'Concept Haus');
				$contact->to($user['correo'], 'Concept Haus')->subject('Concept Haus');
			});
			$chatsid =  array('-275252761','5711355','217972718');
			//$chatsid = array('5711355');
			foreach($chatsid as $id){
                Telegram::sendMessage([
						'chat_id' => $id,
						'parse_mode' => 'HTML',
                        'text' =>'<b>Nuevo lead '. $formulario -> tipo.' 🎉 🎊 😎</b>' 
                        //.Emoji::findByName("sunglasses").''.Emoji::findByName("celebration").''.Emoji::findByName("confetti_ball").'
                        .'

<b>Nombre: </b>'.$registro -> nombre.'
<b>Empresa: </b>'.$registro -> empresa.'
<b>Correo: </b>'.$registro -> correo.'
<b>Tel: </b>'.$registro -> telefono.'
<b>Formulario: </b>'.$formulario -> tipo.'
<b>Nota: </b>'.$registro -> mensaje .'
<b>Servicios: </b>'.implode(", ",$serviciosArray).'
<b>Keyword: </b>'.$request -> utm_term .'
<b>Campaign: </b>'.$request -> utm_campaign,
						'reply_markup'=>json_encode([
                                'inline_keyboard' =>array(array(array("text" => "Ver lead", "url" => "https://concepthaus.mx/registro/detalle/".$registro->id_registro))),
                                'resize_keyboard' => true,
                                'one_time_keyboard' => true
                            ]),


					]);

            }

			

    //Post al nuevo Kiper

      $datosKiper = explode(" ", $registro->nombre);
      if(count($datosKiper)>1){
				$datos = [
          'nombre' => $datosKiper[0],
          'apellido' => $datosKiper[1],
          'empresa' => $registro -> empresa,
          'correo' => $registro -> correo,
          'telefono' => $registro -> telefono,
					'mensaje' => $registro -> mensaje.'. Lista de servicios: '.implode(", ",$serviciosArray),
					'utm_campaign' => $request -> utm_campaign,
					'utm_term' => $request -> utm_term

				];
			}else{
				$datos = [
          'nombre' => $datosKiper[0],
          'apellido' => 'N',
          'empresa' => $registro -> empresa,
          'correo' => $registro -> correo,
          'telefono' => $registro -> telefono,
					'mensaje' => $registro -> mensaje.'. Lista de servicios: '.implode(", ",$serviciosArray),
					'utm_campaign' => $request -> utm_campaign,
					'utm_term' => $request -> utm_term

				];
			}
      
			try{
				$client = new Client(); //GuzzleHttp\Client
				$result = $client->request('POST','https://concepthaus.kiper.io/api/v1/forms/register?token=zW81zjUm6w858ig89dy4C448Fgyil8P3', ['form_params'=> $datos]);

				$json['success'] = "Datos guardados";
				return json_encode($json['success']);
			
			}catch(Exception $e){
			
				return json_encode('Error',400);
			}
      
		}

		// dd($Validator->errors());
		$json['errors'] = $Validator->errors();
		return json_encode($json['errors']);
	}

	// ===================== Almacena datos registro ====================
    public function saveDataRegistroLead(Request $request) {
		date_default_timezone_set('America/Mexico_City');
		$input = $request->all();
		$Validator = $this->validatorRegistroLead($input);
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
			$registro -> nombre    = $request -> nombre;
			$registro -> correo    = $request -> correo;
			$registro -> telefono  = $request -> telefono;
			$registro -> empresa   = $request -> empresa;
			$registro -> mensaje   = $request -> mensaje;
			$registro -> fuente    = $request -> fuente;
			$registro -> proyecto  = $request -> proyecto;
			$registro -> save();

			$user = $registro->toArray();

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

			$serviciosArray = $request->servicios;
			foreach ($serviciosArray as $servicio) {
				$servicios = new PivoteServicios;
				$servicios -> id_registro =  $user['id_registro'];
				$servicios -> servicio    =  $servicio;
				$servicios -> save();
			}

			$json['success'] = "Datos lead manual guardados.";
			return json_encode($json['success']);
		}

		dd($Validator->errors());

		$json['errors'] = $Validator->errors();
		return json_encode($json['errors']);
	}

// ===================== Registro de Brief ====================
  public function registroBrief (Request $request) {
    $input = $request->all();

    $brief = new Brief;
    $brief -> nombre = $input['nombre'];
    $brief -> pregunta_web = $input['pregunta_web'];
    $brief -> pregunta_redes = $input['pregunta_redes'];
    $brief -> pregunta_uno = $input['pregunta_uno'];
    $brief -> pregunta_dos = $input['pregunta_dos'];
    $brief -> pregunta_tres = $input['pregunta_tres'];
    $brief -> pregunta_cuatro = $input['pregunta_cuatro'];
    $brief -> pregunta_cinco = $input['pregunta_cinco'];
    $brief -> pregunta_seis = $input['pregunta_seis'];
    $brief -> pregunta_siete = $input['pregunta_siete'];
    $brief -> pregunta_ocho = $input['pregunta_ocho'];
    $brief -> pregunta_nueve = $input['pregunta_nueve'];
    $brief -> pregunta_diez = $input['pregunta_diez'];
    $brief -> pregunta_once = $input['pregunta_once'];
    if ($request->pregunta_doce) {
      $brief -> pregunta_doce = $input['pregunta_doce'];
    }else {
      $brief -> pregunta_doce = 'No hay comentarios.';
    }

    // $pdf = new PDF();
    $pdf = PDF::loadView('pdf.pdf', $brief);
    // $pdf= PDF::setOptions(['dpi' => 150]);
    $pdf->save('../public/briefs/brief_'.$input['nombre'].'.pdf');
    $pdf->stream();

    $path['path'] = '../public/briefs/brief_'.$input['nombre'].'.pdf';
    $path['nombre'] = $input['nombre'];


    Mail::send('emails.brief.brief-mail' ,$path, function ($contact) use ($path) {
      $contact->from('contacto@concepthaus.mx', 'Concept Haus Brief Branding');
      $contact->to('tomas@concepthaus.mx','Tomas Valles');
      $contact->to('steph@concepthaus.mx','Stepahie Micha');
      $contact->to('lolita@concepthaus.mx','Lolita Davis');
      $contact->to('estefani@concepthaus.mx','Estefani Nava');
      $contact->to('regina@treehaus.mx','Regina Hugues');
      $contact->subject('Concept Haus Brief Branding');
      $contact->attach($path['path']);
    });

    if ($brief -> save()) {
      $json['success'] = "Datos Brief guardados.";
      return json_encode($json['success']);
    }else{
      $json['errors'] = "Hubó un error";
      return json_encode($json['errors']);
    }
  }



}
