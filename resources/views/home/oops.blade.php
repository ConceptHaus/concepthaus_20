@extends('layouts.appThanks')
@section('content')

<div ng-controller="ProyectosController" class="body-thanks">
    <section id="" class="container-fluid d-flex justify-content-center align-items-center h-100">
        <div class="container d-flex justify-content-center align-items-center">
            <div class="row col-md-12 px-0">
                <div class="col-md-12 text-center interiorPuerta">
                  <h1 class="c-red size-title mb-6">¡Gracias <span class="c-gray">por tu interés!</span></h1>
                  <div class="col-md-12 d-flex justify-content-center align-items-center">
                    <p class="interior-titulo col-md-12 text-small2 small-gray text-right c-gray size-subtitle">
                        En breve nos comunicaremos contigo.
                        <br>
                        <span class="c-red size-hastag">#AccentingEverything.</span>
                  </div>

                </div>
                <div class="col-md-12 d-flex justify-content-end align-items-center pr-6">
                  <a href="/" class="btn btn-outline-danger px-4 py-1 btn-border" role="button" aria-pressed="true">Regresar</a>
                </div>
            </div>
        </div>

    </section>



</div>
@endsection
