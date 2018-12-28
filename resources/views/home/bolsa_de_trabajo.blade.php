@extends('layouts.appBolsaTrabajo')

@section('content')

<div ng-controller="VacantesController" ng-cloak>
  <!-- Section |  Bolsa de Trabajo Title -->
  <section id="home-description" class="style-mp">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-8 text-alignstitle">
          <h2 class="title-general mb-4 mt-0 px-titlegeneral">Bolsa de Trabajo</h2>
          <p class="subtitle-general px-auto px-titlegeneral">Oportunidades que te esperan.</p>
        </div>
        {{-- <div class="col-lg-4 text-aligns">
          <a class="subtitle-description" ng-repeat="area in areas" ng-if="area.vacantes != null" href="#<%area.area%>"><span><% area.area %>&nbsp</span></a>
        </div> --}}
      </div>

    </div>
  </section>
  <!--hr -->
  <div class="container-fluid">
    <div class="row px-hr">
      <div class="col-12 col-1hr px-hrcol">
        <hr class="hr-gray">
      </div>
    </div>
  </div>

  <!-- Section | Bolsa de Trabajo Publicidad -->
  <div ng-repeat="areav in areas">
    <section id="<%areav.area%>" ng-if="areav.vacantes != null" class="home-doorsmb">
      <div class="container">
        <div class="row">
          <div class="col-8 col-lg-8 d-flex align-items-end">
            <h2 class="title-proyecto"><img class="img-icon-title" src="{{asset('img/conceptRight.svg')}}" alt="ConceptHaus"><% areav.area %> </h2>
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
            {{-- <p ng-if="!"></p> --}}
          </div>
          <div class="col-lg-6 py-3 px-5">
            <form id="form-postulante">
              {{ csrf_field() }}
            <input ng-model="postulado.id_vacante" name="id_vacante" ng-init="postulado.id_vacante = vacante.id_vacante" type="text" hidden>
              <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="inputEmail4">Aplicar</label>
                      <input ng-model="postulado.nombre" name="nombre" type="text" class="form-control" placeholder="Nombre">
                    </div>
                    <div class="form-group col-md-6">
                      <label for="inputEmail4" class="color-transparent">Apellido</label>
                      <input ng-model="postulado.apellido" name="apellido" type="text" class="form-control" placeholder="Apellido">
                    </div>
                    <div class="form-group col-md-12">
                      <input ng-model="postulado.correo" name="correo" type="email" class="form-control" id="inputEmail4" placeholder="Correo">
                    </div>
                    <div class="form-group col-md-12" >
                            <div class="pointer" ng-if="vacante.cv == 1">
                                    {{-- <a class='btn-submit-upload pointer' href='javascript:;'> --}}
                                      <input class="form-control" ng-model="postulado.cv" ngf-select ngf-pattern="'image/*,application/pdf'" ngf-max-size="20MB" type="file" id="cv" name="cv" onchange='$("#upload-file-info").html($(this).val());'>
                                    {{-- </a> --}}
                                    <span class='label label-info' id="upload-file-info"></span>

                                <p class="subtitle-description" style="margin:0;">Sube tu CV</p>
                                <small class="subtitle-description">Formatos .jpg, .png o .pdf</small>
                            </div>

                    <div ng-if="vacante.portafolio == 1">
                      <input ng-model="postulado.portafolio" name="portafolio" type="url" class="form-control" placeholder="Portafolio">
                      <small id="passwordHelpBlock" class="form-text text-muted subtitle-url">
                            *Url Portafolio
                      </small>
                    </div>
                  {{-- </div> --}}
                  </div>
                  <div class="col-sm-12">
                    <button ng-disabled="!(postulado.nombre) || !(postulado.apellido) || !(postulado.correo)" style="width:100%;" type="submit" class="btn" ng-click="savePostulado(postulado)">ENVIAR</button>
                  </div>
            </form>
            </div>
          </div>


        </div>
      </div>
    </section>
  </div>

</div>

@endsection
