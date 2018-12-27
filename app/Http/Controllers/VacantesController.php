<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vacantes;
use App\Areas;
use App\Postulados;
use Illuminate\Support\Facades\DB;
use Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\UploadFile;
use Mail;

class VacantesController extends Controller
{
  protected function validatorPostulado(array $data){
      return Validator::make($data, [
        'nombre' => 'required | string',
        'apellido' => 'required | string',
        'correo' => 'email',
        'id_vacante' => 'exists:vacantes,id_vacante'
      ]);
  }
  // ===================== Funciones Vacante ====================
  public function createVacante(Request $request){
    try {
      DB::beginTransaction();
      $vacante = new Vacantes;
      $vacante->id_area = $request->id_area;
      $vacante->titulo = $request->titulo;
      $vacante->descripcion = $request->descripcion;
      $vacante->cv = $request->cv;
      $vacante->portafolio = $request->portafolio;
      $vacante->save();
      DB::commit();

      $json['success'] = "Vacante creada correctamente.";

      return json_encode($json['success']);

    } catch (Exception $e) {
      DB::rollBack();

      $json['errors'] = "Datos incorrectos.";

      return json_encode($json['errors']);
    }

  }

  public function getVacantes(){

    $vacantes = Vacantes::getAllVacantes();

    return $vacantes;
  }

  public function getAreas(){

    $areas = Areas::getAllAreas();

    return $areas;
  }

  // ===================== Registro de Postulado ====================
  public function createPostulado (Request $request){

    $validator = $this->validatorPostulado($request->all());

    if ($validator->passes()) {
      try {
          DB::beginTransaction();
          $postulado = new Postulados();
          $postulado->id_vacante = $request->id_vacante;
          $postulado->nombre = $request->nombre;
          $postulado->apellido = $request->apellido;
          $postulado->correo = $request->correo;
          if ($request->cv) {
            $postulado->url_cv = $this->uploadFilesS3($request->cv,$postulado->nombre);
          }else {
            $postulado->url_cv = 'no cv';
          }
          $postulado->url_portafolio = $request->portafolio;
          $postulado->save();
          DB::commit();

          $datos['cv'] = $postulado->url_cv;
          $datos['portafolio'] = $postulado->url_portafolio;
          $datos['nombre'] = $postulado->nombre;
          $datos['apellido'] = $postulado->apellido;
          $datos['vacante'] = Vacantes::where('id_vacante', $postulado->id_vacante)->first();

          Mail::send('emails.brief.brief-mail' ,$datos, function ($contact) use ($datos) {
            $contact->from('contacto@concepthaus.mx', 'Concept Haus Vacante');
            $contact->to('jobs@concepthaus.mx','Jobs ConceptHaus');
            // $contact->to('steph@concepthaus.mx','Stepahie Micha');
            // $contact->to('paola@concepthaus.mx','Paola Mercado');
            $contact->subject('Concept Haus Brief Branding');
            if ($datos['cv'] != 'no cv') {
              $contact->attach($datos['cv']);
            }

          });
          $json['success'] = "Registo correcto.";

        return json_encode($json['success']);

      } catch (Exception $e) {

        DB::rollBack();

          $json['error'] = $e;

        return json_encode($json['error']);
      }
    }

    $json['error'] = $validator->errors();

    return json_encode($json['error']);
  }

  public function uploadFilesS3($file,$user){
        //Sube cv a bucket de Amazon
        $disk = Storage::disk('s3');
        $path = $file->store('concepthaus/cv_'.$user,'s3');
        Storage::setVisibility($path,'public');
        return $disk->url($path);
    }
}
