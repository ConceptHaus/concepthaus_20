@extends('layouts.appAdmin')

@section('content')
    <div class="container-fluid" ng-controller="AdminController" ng-cloak>
      <div class="row">
          <div class="col-md-12">
              <div class="card card-transparent">
                  <div class="card-header card-title-gral" data-background-color="white">
                      <h4 class="title">Registro leads</h4>
                      <p class="category">En esta sección se podrán dar de alta leads manualmente.</p>
                      <img src="{{asset('img/logo/concept.svg')}}" class="ajust-top" alt="Concept Haus">
                  </div>
              </div>
          </div>
      </div>

      <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-content">
                    <div ng-controller="RegistroController as contacto">
                        <form id="contactoForm" name="contactoForm">
                            {{ csrf_field() }}
                            <input type="text" ng-model="contacto.fuente" ng-init="contacto.fuente = '{{auth()->user()->name}}'" hidden required>
                            <input type="text" ng-model="contacto.tipo" ng-init="contacto.tipo='Manual'" name="tipo" hidden required>
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" id="nombre" name="nombre" ng-model="contacto.nombre" placeholder="Cliente" required>
                                    <span class="msg-error" ng-messages="contactoForm.nombre.$error" ng-if="contactoForm.nombre.$touched">
                                        <div ng-messages-include="/messages_error.html"></div>
                                    </span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6">
                                    <input type="email" class="form-control" id="correo" name="correo" ng-model="contacto.correo" placeholder="Correo">
                                    <span class="msg-error" ng-messages="contactoForm.correo.$error" ng-if="contactoForm.correo.$touched">
                                        <div ng-messages-include="/messages_error.html"></div>
                                    </span>
                                </div>
                                <div class="col-sm-6">
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
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <select class="js-theme-multiple form-control" multiple="multiple" ng-model="contacto.servicios" style="width: 100%;">
                                        <option value="Branding">Branding</option>
                                        <option value="Diseño">Diseño</option>
                                        <option value="Web">Web</option>
                                        <option value="3D">3D</option>
                                        <option value="Marketing Digital">Marketing Digital</option>
                                        <option value="SEO">SEO</option>
                                        <option value="Marketing ATL">Marketing ATL</option>
                                        <option value="Marketing BTL">Marketing BTL</option>
                                        <option value="Evento">Evento</option>
                                        <option value="Relaciones Públicas">Relaciones Públicas</option>
                                        <option value="Responsabilidad Social">Responsabilidad Social</option>
                                        <option value="Interiorismo">Interiorismo</option>
                                        <option value="Producción Audiovisual">Producción Audiovisual</option>
                                        <option value="Fotografía">Fotografía</option>
                                        <option value="Varios">Varios</option>
                                    </select>
                                    <span class="msg-error" ng-messages="contactoForm.servicios.$error" ng-if="contactoForm.servicios.$touched">
                                        <div ng-messages-include="/messages_error.html"></div>
                                    </span>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <textarea class="form-control" id="mensaje" name="mensaje" ng-model="contacto.mensaje" placeholder="Nota" rows="4" required></textarea>
                                    <span class="msg-error" ng-messages="contactoForm.mensaje.$error" ng-if="contactoForm.mensaje.$touched">
                                        <div ng-messages-include="/messages_error.html"></div>
                                    </span>
                                </div>
                            </div>

                            <div class="form-group row text-center">
                                <div class="col-sm-12">
                                    <button class="btn btn-red" id="EnviaDatosRegistro" ng-click="saveDataLead(contacto, contactoForm)" ng-disabled="!(contacto.nombre) || !(contacto.empresa) || !(contacto.proyecto) || !(contacto.mensaje)">Agregar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection