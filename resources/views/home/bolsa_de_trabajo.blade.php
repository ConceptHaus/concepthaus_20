@extends('layouts.appBolsaTrabajo')

@section('content')

<div ng-controller="VacantesController" ng-cloak>
  <!-- Section |  Bolsa de Trabajo Title -->
  <section id="home-description" class="style-mp">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 text-alignstitle">
          <h2 class="title-general mb-4 mt-0">Bolsa de Trabajo</h2>
          <p class="subtitle-general px-auto">Oportunidades que te esperan.</p>
        </div>
        <div class="col-lg-4 text-aligns">
          <p ng-repeat="area in areas"><% area.area %></p>
        </div>
      </div>

    </div>
  </section>
  <!--hr -->
  <div class="container">
    <div class="row">
      <div class="col-12 d-flex justify-content-start">
        <hr class="hr-gray">
      </div>
    </div>
  </div>

  <!-- Section | Bolsa de Trabajo Publicidad -->
  <div ng-repeat="areav in areas">
    <section id="Home-doors" class="home-doorsmb">
      <div class="container">
        <div class="row">
          <div class="col-8 col-lg-8 text-alignstitle px-4 d-flex align-items-end">
            <p class="publicidad-title mb-0 px-5 border-leftbt"><img class="img-icon-publicidad" src="{{asset('img/conceptRight.svg')}}" alt="ConceptHaus"><% areav.area %></p>
          </div>
          <div class="col-4 col-lg-4 text-aligns">
            <p></p>
          </div>

        </div>

      </div>

    </section>

    <!-- Section | Bolsa de Trabajo Trainne 1-->
    <section id="home-doors" class="mb-4" ng-repeat="vacante in vacantes" ng-if="vacante.areas.area == areav.area">
      <div class="container">
        <div class="row style-row">
          <div class="col-lg-6 py-3 px-5">
            <h2 class="title-form mb-4 mt-0"><% vacante.titulo %></h2>
            <p class="subtitle-red"><% vacante.areas.area %></p>
            <p class="subtitle-description p-22">Descripción <br>
              <% vacante.descripcion %>
            </p>
          </div>
          <div class="col-lg-6 py-3 px-5">
            <form id="form-postulante">
              {{ csrf_field() }}
            <input ng-model="postulado.id_vacante" name="id_vacante" ng-init="postulado.id_vacante = vacante.id_vacante" type="text" hidden>
              <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="inputEmail4">Aplicar</label>
                      <input ng-model="postulado.nombre" name="nombre" type="text" class="form-control  background-gray" placeholder="Nombre">
                    </div>
                    <div class="form-group col-md-6">
                      <label for="inputEmail4" class="color-transparent">Apellido</label>
                      <input ng-model="postulado.apellido" name="apellido" type="text" class="form-control background-gray" placeholder="Apellido">
                    </div>
                    <div class="form-group col-md-12">
                      <input ng-model="postulado.correo" name="correo" type="email" class="form-control background-gray" id="inputEmail4" placeholder="Correo">
                    </div>
                  </div>
                  <div class="form-row align-items-center">
                    {{-- <div class="col-3 my-1">
                      <div class="custom-control custom-checkbox mr-sm-2">
                        <input type="checkbox" class="custom-control-input" id="customControlAutosizing">
                        <label class="custom-control-label cv-style" for="customControlAutosizing">CV</label>
                      </div>
                    </div>
                    <div class="col-3 my-1">
                      <button type="submit" class="btn btn-gray">SUBIR</button>
                    </div> --}}
                    <div class="form-group">
                            <div class="col-md-10 pointer">
                                    {{-- <a class='btn-submit-upload pointer' href='javascript:;'> --}}
                                      <input ng-model="postulado.cv" ngf-select ngf-pattern="'image/*,application/pdf'" ngf-max-size="20MB" type="file" id="cv" class="inputfile" name="cv" onchange='$("#upload-file-info").html($(this).val());'>
                                    {{-- </a> --}}
                                    <span class='label label-info' id="upload-file-info"></span>

                                <h5 class="blanco mt-2">Sube tu CV</h5>
                                <small>Formatos .jpg, .png o .pdf</small>
                            </div>
                        </div>
                    <div class="col-6 my-1">
                      <input ng-model="postulado.portafolio" name="portafolio" type="url" class="form-control background-gray" placeholder="Portafolio">
                      <small id="passwordHelpBlock" class="form-text text-muted subtitle-url">
                            *Url Portafolio
                      </small>
                    </div>


                  </div>
                  <div class="col-12 d-flex justify-content-center align-items-center">
                    <button type="submit" class="btn btn-red" ng-click="savePostulado(postulado)">ENVIAR</button>
                  </div>
            </form>
          </div>


        </div>
      </div>
    </section>
  </div>

</div>

@endsection
