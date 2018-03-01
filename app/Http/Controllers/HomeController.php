<?php

namespace App\Http\Controllers;
use Carbon\Carbon;

use App\Registros;
use App\FechaRegistro;
use App\Ubicacion;
use App\NoSocio;
use App\Pivot_Models\PivoteStatus;

use Illuminate\Http\Request;

use Mail;

class HomeController extends Controller
{
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $dashboard['registros'] = Registros::all();
        $dashboard['proceso'] = PivoteStatus::where('id_status','=',1)->get();
        $dashboard['socios'] = PivoteStatus::where('id_status','=',2)->get();
        $dashboard['descartados'] = PivoteStatus::where('id_status','=',3)->get();
        $dashboard['cotizados'] = PivoteStatus::where('id_status','=',4)->get();
        
        return view('home', $dashboard);
    }

    public function  getRegistros() {
        $dashboard['registros'] = Registros::all();
        $dashboard['proceso'] = PivoteStatus::where('id_status','=',1)->get();
        $dashboard['socios'] = PivoteStatus::where('id_status','=',2)->get();
        $dashboard['descartados'] = PivoteStatus::where('id_status','=',3)->get();
        $dashboard['cotizados'] = PivoteStatus::where('id_status','=',4)->get();        
        return view('admin/registros', $dashboard);
    }

    public function  getRegistrosProceso() {
        $dashboard['registros'] = Registros::all();
        $dashboard['proceso'] = PivoteStatus::where('id_status','=',1)->get();
        return view('admin/registros_proceso', $dashboard);
    }
    

    public function  getRegistrosCheck() {
        $dashboard['registros'] = Registros::all();
        $dashboard['socios'] = PivoteStatus::where('id_status','=',2)->get();
        return view('admin/registros_check', $dashboard);
    }

    public function  getRegistrosClose() {
        $dashboard['registros'] = Registros::all();
        $dashboard['descartados'] = PivoteStatus::where('id_status','=',3)->get();
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



    

    
}