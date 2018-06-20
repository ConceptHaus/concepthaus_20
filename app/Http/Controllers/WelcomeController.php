<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

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

    public function viewWeb(){
        return view('home/web');
    }

    public function viewSeo(){
        return view('home/seo');
    }

    public function viewAds(){
        return view('home/socialads');
    }
}