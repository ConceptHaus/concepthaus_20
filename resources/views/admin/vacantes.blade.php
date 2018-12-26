@extends('layouts.appAdmin')
<style media="screen">
  .loading-img{
    width: 80px !important;
    height: 80px !important;
    margin-top: 10px !important;
  }
</style>
@section('content')
  <div ng-controller="VacantesController" ng-cloak>
    <!-- Section |  Bolsa de Trabajo Title -->
    {{-- <section id="home-description" class="style-mp">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12 text-alignstitle">
            <h2 class="title-general mb-4 mt-0 px-titlegeneral">Bolsa de Trabajo</h2>
            <p class="subtitle-general px-auto px-titlegeneral">Creación de Oportunidades</p>
          </div>

        </div>

      </div>
    </section> --}}
    <!--hr -->
    <div class="row">
        <div class="col-md-12">
            <div class="card card-transparent">
                <div class="card-header card-title-gral" data-background-color="white">
                    <h4 class="title">Bolsa de Trabajo</h4>
                    <p class="category">Creación de Oportunidades</p>
                    <img src="{{asset('img/logo/concept.svg')}}" class="ajust-top" alt="Concept Haus">
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
      <div class="row px-hr">
        <div class="col-12 col-1hr px-hrcol">
          <hr class="hr-gray">
        </div>
      </div>
    </div>

    <!-- Section | Bolsa de Trabajo Publicidad -->
    <section class="home-doorsmb">
      <div class="container-fluid">
        <div class="row">

          <div class="col-8 col-lg-8 text-alignstitle px-3 d-flex align-items-end">
            <p class="publicidad-title mb-0 px-0 border-leftbt"><img class="img-icon-publicidad" src="{{asset('img/conceptRight.svg')}}" alt="ConceptHaus">
              Crear nueva vacante</p>
          </div>
          {{-- <div class="col-4 col-lg-4 text-aligns d-flex justify-content-end">
            <p>3 Vacantes</p>
          </div> --}}

        </div>

      </div>

    </section>
    <div class="row">
      <div class="col-md-12">
          <div class="card">
              <div class="card-content">
                  <div ng-controller="VacantesController">
                      <form id="vacantesForm" name="vacantesForm">
                          {{ csrf_field() }}
                          <div class="form-group row">
                              <div class="col-sm-12">
                                  {{-- <input type="text" class="form-control" id="nombre" name="nombre" ng-model="contacto.nombre" placeholder="Cliente" required>
                                  <span class="msg-error" ng-messages="contactoForm.nombre.$error" ng-if="contactoForm.nombre.$touched">
                                      <div ng-messages-include="/messages_error.html"></div>
                                  </span> --}}
                                  <input ng-model="vacante.titulo" name="titulo" type="text" class="form-control background-gray" id="validationTooltip01" placeholder="Nombre de la vacante" required>
                              </div>
                          </div>
                          <div class="form-group row">
                              <div class="col-sm-6">
                                  {{-- <input type="email" class="form-control" id="correo" name="correo" ng-model="contacto.correo" placeholder="Correo">
                                  <span class="msg-error" ng-messages="contactoForm.correo.$error" ng-if="contactoForm.correo.$touched">
                                      <div ng-messages-include="/messages_error.html"></div>
                                  </span> --}}
                                  <label for="validationTooltip02">Selecciona el área del trabajo.</label>
                                  {{-- <input type="text" class="form-control background-gray" id="validationTooltip02" placeholder="Área de trabajo" value="" required> --}}
                                  <select class="form-control" ng-model="vacante.id_area" name="id_area">
                                    <option value="?" selected="selected">Selecciona el área de trabajo.</option>
                                    <option ng-repeat="area in areas" value="<%area.id_area%>"><% area.area %></option>
                                  </select>
                              </div>
                            </div>
                              {{-- <div class="col-sm-6">
                                  <input type="text" class="form-control" id="telefono" name="telefono" mask="99999999999999999999" ng-model="contacto.telefono" ng-minlength="8"
                                      placeholder="Teléfono">
                                  <span class="msg-error" ng-messages="contactoForm.telefono.$error" ng-if="contactoForm.telefono.$touched">
                                      <div ng-messages-include="/messages_error.html"></div>
                                  </span>
                              </div>
                          </div>
                          <div class="form-group row">
                              <div class="col-sm-6">
                                  <input type="text" class="form-control" id="empresa" name="empresa" ng-model="contacto.empresa" placeholder="Empresa" required>
                                  <span class="msg-error" ng-messages="contactoForm.empresa.$error" ng-if="contactoForm.empresa.$touched">
                                      <div ng-messages-include="/messages_error.html"></div>
                                  </span>
                              </div>
                              <div class="col-sm-6">
                                  <input type="text" class="form-control" id="proyecto" name="proyecto" ng-model="contacto.proyecto" placeholder="Proyecto" required>
                                  <span class="msg-error" ng-messages="contactoForm.proyecto.$error" ng-if="contactoForm.proyecto.$touched">
                                      <div ng-messages-include="/messages_error.html"></div>
                                  </span>
                              </div>
                          </div> --}}
                          <div class="form-group row">
                            <div class="col-md-12">
                              <label for="exampleFormControlTextarea1">¿Requiere un Curriculum y un portafolio?</label>
                              <label for="exampleFormControlTextarea1">Selecciona los requerimientos que deberá poner el aspirante:</label>

                              {{-- <div class="from-group"> --}}
                              <div class="form-check form-check-inline col-6 d-flex align-items-center justify-content-start">
                                <input class="form-check-input" type="checkbox" name="cv" id="inlineRadio1" ng-model="vacante.cv" ng-init="vacante.cv = 0" ng-true-value="1" ng-false-value="0">
                                <label class="form-check-label" for="inlineRadio1">CV</label>
                                </div>
                                <div class="form-check form-check-inline col-6 d-flex align-items-center justify-content-start">
                                  <input class="form-check-input" type="checkbox" name="portafolio" id="inlineRadio2" ng-model="vacante.portafolio" ng-init="vacante.portafolio = 0" ng-true-value="1" ng-false-value="0">
                                  <label class="form-check-label" for="inlineRadio2">Portafolio</label>
                                </div>
                          {{-- </div> --}}
                        </div>
                      </div>

                          <div class="form-group row">
                              <div class="col-sm-12">
                                  {{-- <textarea class="form-control" id="mensaje" name="mensaje" ng-model="contacto.mensaje" placeholder="Nota" rows="4" required></textarea>
                                  <span class="msg-error" ng-messages="contactoForm.mensaje.$error" ng-if="contactoForm.mensaje.$touched">
                                      <div ng-messages-include="/messages_error.html"></div>
                                  </span> --}}
                                  <label for="exampleFormControlTextarea1">Escribe una breve descripción del trabajo.</label>
                                  <textarea class="form-control text-area" id="exampleFormControlTextarea1" rows="4" ng-model="vacante.descripcion" name="descripcion"></textarea>
                              </div>
                          </div>

                          {{-- <div class="form-group row">
                              <div class="col-sm-12">
                                  <label>Servicios</label>
                                  <div isteven-multi-select
                                      input-model="listServicies"
                                      output-model="contacto.outputServicies"
                                      button-label="icon name"
                                      item-label="icon name maker"
                                      tick-property="ticked"
                                      class="formNewSelect">
                                  </div>
                                  <span class="msg-error" ng-messages="contactoForm.outputServicies.$error" ng-if="contactoForm.outputServicies.$touched">
                                      <div ng-messages-include="/messages_error.html"></div>
                                  </span>
                              </div>
                          </div> --}}

                          <div class="form-group row text-center">
                              <div class="col-sm-12">
                                  <button class="btn btn-red" ng-click="saveVacante(vacante, vacantesForm)">Crear Vacante</button>
                              </div>
                          </div>
                      </form>
                  </div>
              </div>
          </div>
      </div>
  </div>

    <!-- Section | Bolsa de Trabajo Trainne 1-->
    {{-- <section id="home-doors" class="mb-4">
      <div class="container">
        <div class="row style-row">

          <div class="col-lg-6 py-3 px-5">
            <form class="needs-validation" novalidate>
                <div class="form-row">
                  <div class="col-md-12">
                    <label for="validationTooltip01">Escribe el nombre del trabajo. <span class="c-maxred">(Max 3 palabras)</span></label>
                    <input ng-model="vacante.titulo" name="titulo" type="text" class="form-control background-gray" id="validationTooltip01" placeholder="Nombre" required>
                  </div>
                  <div class="col-md-12">
                    <label for="validationTooltip02">Selecciona el área del trabajo.</label>
                    <input type="text" class="form-control background-gray" id="validationTooltip02" placeholder="Área de trabajo" value="" required>
                    <select class="form-control background-gray" ng-model="vacante.id_area" name="id_area">
                      <option value="?" selected="selected">Selecciona el área de trabajo.</option>
                      <option ng-repeat="area in areas" value="<%area.id_area%>"><% area.area %></option>
                    </select>
                  </div>
                  <div class="col-md-12">
                    <label for="exampleFormControlTextarea1">¿Requiere un Curriculum y un portafolio?</label>
                    <label for="exampleFormControlTextarea1">Selecciona los requerimientos que deberá poner el aspirante:</label>
                  </div>
                </div>
                <div class="container">
                <div class="row">
                  <div class="col-md-12">
                    <div class="from-group d-flex align-items-center justify-content-start">
                    <div class="form-check form-check-inline col-6 d-flex align-items-center justify-content-start">
                      <input class="form-check-input" type="checkbox" name="cv" id="inlineRadio1" ng-model="vacante.cv" ng-init="vacante.cv = 0" ng-true-value="1" ng-false-value="0">
                      <label class="form-check-label" for="inlineRadio1">CV</label>
                      </div>
                      <div class="form-check form-check-inline col-6 d-flex align-items-center justify-content-start">
                        <label class="form-check-label" for="inlineRadio2">Portafolio</label>
                        <input class="form-check-input" type="checkbox" name="portafolio" id="inlineRadio2" ng-model="vacante.portafolio" ng-init="vacante.portafolio = 0" ng-true-value="1" ng-false-value="0">
                      </div>

                  </div>
                </div>

                    </div>
                  </div>



          </div>

          <div class="col-lg-6 py-3 px-5">
            <div class="form-group">
              <label for="exampleFormControlTextarea1">Escribe una breve descripción del trabajo.</label>
              <textarea class="form-control text-area" id="exampleFormControlTextarea1" rows="5" ng-model="vacante.descripcion" name="descripcion"></textarea>
            </div>
          </div>


        </div>
      </div>
    </section>
    <!-- Section | Bolsa de Trabajo Publicidad -->
    <section class="home-doorsmb">
      <div class="container">
        <div class="row">

          <div class="col-12 d-flex justify-content-center align-items-start">
            <button ng-click="saveVacante(vacante)" type="submit" class="btn btn-red m0">CREAR</button>
          </div>


        </div>

      </div>

    </section>
</form>
  </div> --}}
@endsection
