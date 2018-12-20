@extends('layouts.appThanks')
@section('content')

<div ng-controller="ProyectosController" class="body-thanks">
    <section id="" class="container-fluid d-flex justify-content-center align-items-center h-100">
        <div class="container-fluid d-flex justify-content-center align-items-center m-auto">
            <div class="row col-md-12 px-0">
                <div class="col-md-12 text-center">
                  <div class="col-md-12 d-flex justify-content-center align-items-center flex-wrap">
                    <div class="col-sm-6 align-textoops">
                      <img class="c-white size-titleoops px-31 img-fluidoops" draggable="false" src="{{asset('img/oops/oops.png')}}" alt="">
                        <!-- <h1 class="c-white size-titleoops px-31">OOPS!</h1>-->

                    </div>
                    <div class="col-lg-ex border-leftoops">
                      <p class="interior-titulooops col-md-12 text-small3 text-xl-left c-red">
                          Algo salió mal :(
                          <br>
                          <span class="c-gray">Error inesperado,
                            <br>
                            inténtalo de nuevo.
                          </span>
                    </div>

                  </div>

                </div>
                <div class="container">
                  <div class="row">
                    <div class="col-md-12 d-flex justify-content-end align-items-center btn-justify">
                        <a href="{{url('/')}}" class="btn btn-outline-danger px-4 py-1 btn-border" role="button" aria-pressed="true">Regresar</a>

                    </div>

                  </div>
                </div>

            </div>
        </div>

    </section>



</div>
@endsection
