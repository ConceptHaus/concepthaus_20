<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;


// require 'vendor/autoload.php';
use GuzzleHttp\Client;
// use GuzzleHttp\Exception\RequestException;
// use GuzzleHttp\Psr7\Response;


class WelcomeController extends Controller {
    public function viewHome() {
        return view('home/welcome');
    }

    public function viewCrew() {
        return view('home/crew');
    }

    public function viewConceptHaus() {
        return view('home/concept');
    }

    public function viewInHaus() {
        return view('home/inhaus');
    }

    public function viewTreeHaus() {
        return view('home/treehaus');
    }

    public function viewStartups() {
        return view('home/startups');
    }

    public function viewBranding() {
        return view('home/branding');
    }
    public function viewAviso(){
        return view('home/aviso');
    }

    public function viewpoliticas(){
        return view('home/politica-de-seguridad-y-privacidad');
    }



    public function viewBrandingcolombia() {
        return view('home/branding_colombia');
    }

    public function viewBrandingusa() {
        return view('home/branding_usa');
    }

    public function viewBrandinguk() {
        return view('home/branding_uk');
    }

    public function viewWeb(){
        return view('home/web');
    }

    public function viewSeo(){
        return view('home/seo');
    }

    public function viewAds(){
        return view('home/socialads');
    }

    public function viewBrief(){
        return view('home/brief-branding');
    }

    public function viewPDF(){
      return view('pdf/pdf');
    }
    // Landing page thanks
    public function viewGracias() {
        return view('home/gracias');
    }
    // Landing page Oops
    public function viewError() {
        return view('home/error');
    }
    // vista 2 bolsa de trabajo
    public function viewBolsadetrabajo() {
        return view('home/bolsa_de_trabajo');
    }
    // Detalle proyecto
    public function viewDetailProject($id){
      $data['id'] = $id;

        // $client = new \GuzzleHttp\Client();
        // $result = $client->request('GET', 'https://www.behance.net/v2/projects/'.$id,  [
        //     'query' => [
        //         'client_id' => 'aeyWwVoxxS9DxTLvJ0W6scIauKj3Bpbg'
        //     ],
        //     'headers' => [
        //         // 'Accept' => 'application/json',
        //         // 'Content-type' => 'application/json'
        //         'Content-type' => 'application/json; charset=utf-8',
        //         'Accept' => 'application/json',
        //     ]
        // ]);

        // $data['details'] = $result->getBody();


        return view('home/project',$data);
    }
}
