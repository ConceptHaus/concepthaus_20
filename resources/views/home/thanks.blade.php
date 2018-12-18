@extends('layouts.app')
@section('content')

<div ng-controller="ProyectosController" class="body-thanks">
    <section id="home-doors-interior">
        <div class="container d-flex  justify-content-center align-items-center">
            <div class="row col-md-12">
                <div class="col-md-12 text-center interiorPuerta">
                  <h1 class="c-red size-title">¡Gracias <span class="c-gray">por tu interés!</span></h1>
                  <div class="col-md-12 d-flex  justify-content-center align-items-center">
                    <p class="interior-titulo col-md-12 text-small small-gray text-right c-gray">
                        En breve nos comunicaremos contigo.
                        <br><br>
                        <span class="c-red">#AccentingEverything.</span>
                  </div>

                </div>
                <div class="col-md-12 d-flex  justify-content-center align-items-center">
                  <button type="button" class="btn btn-outline-danger px-4 py-1">Regresar</button>
                </div>
            </div>
        </div>
        <div class="container-fluid fixed-bottom">
          <footer class="mt-auto">
          <div class="inner">
            <p>Cover template for <a href="https://getbootstrap.com/">Bootstrap</a>, by <a href="https://twitter.com/mdo">@mdo</a>.</p>
          </div>
        </footer>

        </div>
    </section>



</div>
@endsection
