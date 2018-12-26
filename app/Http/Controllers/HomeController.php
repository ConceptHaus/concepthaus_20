<?php

namespace App\Http\Controllers;
use Carbon\Carbon;

use App\Registros;
use App\FechaRegistro;
use App\Ubicacion;
use App\NoSocio;
use App\CodigoRegistro;
use App\Pivot_Models\PivoteStatus;
use App\Pivot_Models\PivoteForms;
use App\Pivot_Models\PivoteServicios;
use App\Pivot_Models\PivoteMedios;
use Telegram\Bot\FileUpload\InputFile;
use Telegram\Bot\Laravel\Facades\Telegram;
use App\Vacantes;
use App\Postulados;
use App\Areas;
use Emoji;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

use Validator;
use Mail;

class HomeController extends Controller {
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        date_default_timezone_set('America/Mexico_City');
        $this->middleware('auth');
    }

    // ===================== Validadores ====================
	protected function validatorEditLead(array $data){
        return Validator::make($data, [
            'nombre'     => 'required',
			'correo'     => 'email',
			'empresa'    => 'required',
			'mensaje'    => 'required',
        ]);
	}

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $dashboard['registros'] = Registros::all();
        $dashboard['recibido'] = PivoteStatus::where('id_status','=',1)->get();
        $dashboard['proceso'] = PivoteStatus::where('id_status','=',5)->get();
        $dashboard['socios'] = PivoteStatus::where('id_status','=',3)->get();
        $dashboard['descartados'] = PivoteStatus::where('id_status','=',2)->get();
        $dashboard['cotizados'] = PivoteStatus::where('id_status','=',4)->get();

        return view('home', $dashboard);
    }

    public function getUserLeads() {
        // $dashboard['registros'] = Registros::where('fuente','=',auth()->user()->name)->get();
        $dashboard['registros'] = Registros::all();
        $dashboard['recibido'] = PivoteStatus::where('id_status','=',1)->get();
        $dashboard['socios'] = PivoteStatus::where('id_status','=',2)->get();
        $dashboard['descartados'] = PivoteStatus::where('id_status','=',3)->get();
        $dashboard['cotizados'] = PivoteStatus::where('id_status','=',4)->get();

        return view('admin/registros_user', $dashboard);
    }

    public function  getRegistros() {
        $dashboard['registros'] = Registros::all();

        // $dashboard['contacto'] = DB::table('registros')
        //                         ->leftJoin('pivot_medios', 'pivot_medios.id_registro', '=', 'registros.id_registro')
        //                         ->select('registros.id_registro', 'registros.nombre', 'pivot_medios.*')
        //                         ->get();

        $dashboard['recibido'] = PivoteStatus::where('id_status','=',1)->get();
        $dashboard['proceso'] = PivoteStatus::where('id_status','=',5)->get();
        $dashboard['socios'] = PivoteStatus::where('id_status','=',2)->get();
        $dashboard['descartados'] = PivoteStatus::where('id_status','=',3)->get();
        $dashboard['cotizados'] = PivoteStatus::where('id_status','=',4)->get();
        return view('admin/registros', $dashboard);
    }

    public function  getRegistrosRecibido() {
        $dashboard['registros'] = Registros::all();
        $dashboard['recibido'] = PivoteStatus::where('id_status','=',1)->get();
        return view('admin/registros_recibido', $dashboard);
    }

    public function  getRegistrosProceso() {
        $dashboard['registros'] = Registros::all();
        $dashboard['proceso'] = PivoteStatus::where('id_status','=',5)->get();
        return view('admin/registros_proceso', $dashboard);
    }

    public function  getRegistrosCheck() {
        $dashboard['registros'] = Registros::all();
        $dashboard['socios'] = PivoteStatus::where('id_status','=',3)->get();
        return view('admin/registros_check', $dashboard);
    }

    public function  getRegistrosClose() {
        $dashboard['registros'] = Registros::all();
        $dashboard['descartados'] = PivoteStatus::where('id_status','=',2)->get();
        return view('admin/registros_close', $dashboard);
    }

    public function  getRegistrosCotizado() {
        $dashboard['registros'] = Registros::all();
        $dashboard['cotizados'] = PivoteStatus::where('id_status','=',4)->get();
        return view('admin/registros_cotizado', $dashboard);
    }

    public function  getRegistroDetalle($id) {
        $data['info_user'] = Registros::GetOneRegistro($id)->get();
        return view('admin/registro_detalle',$data);
        //return response()->json($data);
    }

    public function getUserData() {
        // $data['info_user'] = Auth::id();
        return view('admin/registro_lead');
    }

    // ===================== Ajax get data ====================
	public function getRegistrosAjax(){
        $registros = Registros::GetAllRegistros();
        return response()->json($registros);
    }

    public function getRegistrosLastestAjax(){
        $registros = Registros::GetLastestRegistros();
        return response()->json($registros);
    }

    public function getfilterDataRegistros(Request $data){
        $fecha_inicial = new Carbon($data->fecha_inicial);
        $fecha_inicial = $fecha_inicial->format('Y/m/d');
        $data->fecha_inicial = $fecha_inicial;
        $fecha_final = new Carbon($data->fecha_final);
        $fecha_final = $fecha_final->format('Y/m/d');
        $data->fecha_final = $fecha_final;

        $registros = Registros::GetFilterDate($fecha_inicial ,$fecha_final);
        return response()->json($registros);
    }

    public function saveUpdateStatusCompra(Request $data, $id_socio) {
        date_default_timezone_set('America/Mexico_City');
        $socio = NoSocio::where('id_nosocio','=',$id_socio)->first();
        $socio -> compra  = $data -> status_compra;
        $socio->save();
        $json['success'] = 'Datos guardados';
        return json_encode($json);
    }

    // ===================== Gráficas ====================
    public function getGraficasSemanal(){
        $now = date('Y/m/d');
        $lastweek = Carbon::now()->subDay(6)->format('Y/m/d');
        $contactos = FechaRegistro::whereBetween('fecha_completa',[$lastweek, $now])->get();
        $contactos['hoy'] = $now;
        $contactos['DaysBefore'] = $lastweek;
        return response()->json($contactos);
    }

    public function getGraficasMensual(){
        $contactos = FechaRegistro::all();
        return response()->json($contactos);
    }

    public function getGraficasMensualRecibidos(){
        $contactos = DB::table('pivot_status')
                    ->join('fecha_registro', 'pivot_status.id_registro', '=', 'fecha_registro.id_registro')
                    ->where('pivot_status.id_status','=',1)
                    ->get();
        return response()->json($contactos);
    }

    public function getGraficasMensualProceso(){
        $contactos = DB::table('pivot_status')
                    ->join('fecha_registro', 'pivot_status.id_registro', '=', 'fecha_registro.id_registro')
                    ->where('pivot_status.id_status','=',5)
                    ->get();
        return response()->json($contactos);
    }

    public function getGraficasMensualCotizados(){
        $contactos = DB::table('pivot_status')
                    ->join('fecha_registro', 'pivot_status.id_registro', '=', 'fecha_registro.id_registro')
                    ->where('pivot_status.id_status','=',4)
                    ->get();
        return response()->json($contactos);
    }

    public function getGraficasMensualCerrados(){
        $contactos = DB::table('pivot_status')
                    ->join('fecha_registro', 'pivot_status.id_registro', '=', 'fecha_registro.id_registro')
                    ->where('pivot_status.id_status','=',2)
                    ->get();
        return response()->json($contactos);
    }

    public function getGraficasMensualNoViables(){
        $contactos = DB::table('pivot_status')
                    ->join('fecha_registro', 'pivot_status.id_registro', '=', 'fecha_registro.id_registro')
                    ->where('pivot_status.id_status','=',3)
                    ->get();
        return response()->json($contactos);
    }

    // Función que acompleta los datos de Facebook (Relación con tablas)
    public function saveDataFacebook(){
        $registros = Registros::where('fecha_fb','!=', null)->get();
        // $registros = Registros::where('id_registro','=','1028')->get();
        // echo ($registros);
        foreach ($registros as &$valor) {

            $ubicacion = new Ubicacion;
			$ubicacion -> id_registro = $valor['id_registro'];
            $ubicacion -> ciudad      = $valor['city_fb'];
            $ubicacion -> estado      = '';
            $ubicacion -> save();

            $status = new PivoteStatus;
			$status -> id_status   =  1;
			$status -> id_registro =  $valor['id_registro'];
            $status -> save();

            // Formatos fecha
            $fecha  = $valor['fecha_fb'];
            $array1 = explode("T", $fecha);
            $array2 = explode("-", $array1[0]);
            $array3 = explode("+", $array1[1]);
            $array4 = explode(":", $array3[0]);

            $year = $array2[0];
            $month = $array2[1];
            $day = $array2[2];
            $hour = $array4[0];
            $minute = $array4[1];
            $second = $array4[2];

            $fechaFormato = Carbon::create($year, $month, $day, $hour, $minute, $second);

            $dia = $fechaFormato->format('l');
            $mes = $fechaFormato->format('m');
            $hora = $fechaFormato->format('H:i');
            $fecha = $fechaFormato->format('Y/m/d');

            $fechas_registro =  new FechaRegistro;
			$fechas_registro -> id_registro 	= $valor['id_registro'];
			$fechas_registro -> dia      		= $dia;
			$fechas_registro -> mes      		= $mes;
			$fechas_registro -> hora      		= $hora;
			$fechas_registro -> fecha_completa  = $fecha;
			$fechas_registro -> save();

        }
        echo ('Datos guardados');
    }


    // ===================== Elimina datos registro ====================
    public function deleteDataRegistroLead(Request $data) {
		try {
			$registro = Registros::find($data['id_registro']);
			$registro -> delete();

			$registroCodigo = CodigoRegistro::where('id_registro','=',$data['id_registro'])->first();
			$registroCodigo -> delete();

			$registroForm = PivoteForms::where('id_registro','=',$data['id_registro'])->first();
			$registroForm -> delete();

			$registroServicios = PivoteServicios::where('id_registro','=',$data['id_registro'])->get();
			foreach ($registroServicios as $servicio) {
				$servicio -> delete();
			}

			$json['success'] = "Datos lead eliminados";
			return json_encode($json['success']);
		}
		catch (\Exception $e) {
			$json['errors'] = "Datos no eliminados";
			return json_encode($json['errors']);
		}
    }

    // ===================== Editar datos registro ====================
    public function editDataRegistroLead(Request $data) {
		$input = $data->all();
		$Validator = $this->validatorEditLead($input);

		if($Validator->passes()){

            $lead = Registros::where('id_registro','=',$data['id_registro'])->first();
			$lead -> nombre    = $data -> nombre;
			$lead -> correo    = $data -> correo;
			$lead -> telefono  = $data -> telefono;
			$lead -> empresa   = $data -> empresa;
			$lead -> mensaje   = $data -> mensaje;
			$lead -> proyecto  = $data -> proyecto;
            $lead -> save();

            $servicios = PivoteServicios::where('id_registro','=',$data['id_registro'])->get();
            foreach ($servicios as $servicio) {
                $arraySave[] = $servicio->servicio;
            }
            $arrayRefresh = $data->servicies;

            // echo("ELEMENTO A BORRAR BD=");
            // $resultados = array_diff($arraySave, $arrayRefresh);
            // foreach ($resultados as $resultado) {
            //     $deleteServicie = PivoteServicios::where('servicio','=',$resultado)->get();
			//     $deleteServicie -> delete();
            // }

            // echo("<br>");
            // echo("ELEMENTOS AGREGAR BD =");
            foreach ($arrayRefresh as $value1) {
                $encontrado=false;
                foreach ($arraySave as $value2) {
                    if ($value1 == $value2){
                        $encontrado=true;
                        $break;
                    }
                }
                if ($encontrado == false){
                    $servicios = new PivoteServicios;
			        $servicios -> id_registro =  $data['id_registro'];
			        $servicios -> servicio    =  $value1;
		            $servicios -> save();
                }
            }

			$json['success'] = "Datos guardados";
			return json_encode($json['success']);
		}

		$json['errors'] = $Validator->errors();
		return json_encode($json['errors']);
    }

    // ===================== Elimina servicios del registro ====================
    public function deleteServicieRegistroLead(Request $data) {
		try {
            $eliminarServicios = PivoteServicios::where('id_pivot_servicio','=',$data['id_pivot_servicio'])->first();
			$eliminarServicios -> delete();

			$json['success'] = "Datos lead eliminados";
			return json_encode($json['success']);
		}
		catch (\Exception $e) {
			$json['errors'] = "Datos no eliminados";
			return json_encode($json['errors']);
		}
    }

    // vista final bolsa de trabajo creacion de oportunidades
    public function getVacantesAdmin() {
        return view('admin/vacantes');
    }

    public function getVacantesPostulados(){
      $vacantes = Vacantes::getVacantesPostulados();

      return $vacantes;
    }

    public function vacantesDashboard(){
      return view('admin/vacantesDashboard');
    }

    public function detalleVacantes($id){
      $vacante = Vacantes::getOneVacante($id);
      $detalle['vacante'] = $vacante;
      $detalle['postulados'] = $vacante->postulados;
      return view('/admin/detalleVacante',$detalle);
    }

    public function deleteVacante($id){
      $vacante = Vacantes::where('id_vacante', $id)->first();

      try {
        DB::beginTransaction();
        $vacante->delete();
        DB::commit();
        $json['success'] = 'Vacante Borrada correctamente';
        return json_encode($json['success']);
      } catch (Exception $e) {
        DB::rollBack();
        $json['errors'] = $e;
        return json_encode($json['errors']);
      }

    }

}
