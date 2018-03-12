@extends('layouts.appService') @section('content')

<div id="branding" ng-controller="ProyectosController">
    <section class="contact-branding" ng-controller="RegistroController as contacto">
        <div class="row">
            <div class="col-md-6">
                <h4 class="title-general c-gray">Naming e Indentidad Corporativa</h4>
            </div>
            <div class="col-md-6">
                <form id="contactoForm" name="contactoForm">
                    {{ csrf_field() }}
                    <input type="text" class="form-control" id="fuente" name="fuente" ng-model="contacto.fuente" ng-init="contacto.fuente='Google'"
                        hidden required>
                    <input type="text" class="form-control" id="tipo" name="tipo" ng-model="contacto.tipo" ng-init="contacto.tipo='Branding'"
                        hidden required>
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="nombre" name="nombre" ng-model="contacto.nombre" placeholder="Nombre" required>
                            <span class="msg-error" ng-messages="contactoForm.nombre.$error" ng-if="contactoForm.nombre.$touched">
                                <div ng-messages-include="/messages_error.html"></div>
                            </span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <input type="email" class="form-control input-ajust" id="correo" name="correo" ng-model="contacto.correo" placeholder="Correo" required>
                            <span class="msg-error" ng-messages="contactoForm.correo.$error" ng-if="contactoForm.correo.$touched">
                                <div ng-messages-include="/messages_error.html"></div>
                            </span>
                        </div>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="telefono" name="telefono" mask="9999999999" ng-model="contacto.telefono" ng-minlength="8"
                                placeholder="Teléfono" required>
                            <span class="msg-error" ng-messages="contactoForm.telefono.$error" ng-if="contactoForm.telefono.$touched">
                                <div ng-messages-include="/messages_error.html"></div>
                            </span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <select class="js-theme-multiple" multiple="multiple" ng-model="contacto.servicios">
                                <option value="Branding">Branding</option>
                                <option value="Diseño">Diseño</option>
                                <option value="Web">Web</option>
                                <option value="Marketing Digital">Marketing Digital</option>
                                <option value="Marketing ATL">Marketing ATL</option>
                                <option value="Marketing BTL">Marketing BTL</option>
                                <option value="Evento">Evento</option>
                                <option value="Relaciones Públicas">Relaciones Públicas</option>
                                <option value="Interiorismo">Interiorismo</option>
                                <option value="Producción Audiovisual">Producción Audiovisual</option>
                                <option value="Fotografía">Fotografía</option>
                                <option value="Otra">Otra</option>
                            </select>
                            <span class="msg-error" ng-messages="contactoForm.servicios.$error" ng-if="contactoForm.servicios.$touched">
                                <div ng-messages-include="/messages_error.html"></div>
                            </span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="empresa" name="empresa" ng-model="contacto.empresa" placeholder="Empresa" required>
                            <span class="msg-error" ng-messages="contactoForm.empresa.$error" ng-if="contactoForm.empresa.$touched">
                                <div ng-messages-include="/messages_error.html"></div>
                            </span>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-12">
                            <textarea class="form-control" id="mensaje" name="mensaje" ng-model="contacto.mensaje" placeholder="Mensaje" rows="4" required></textarea>
                            <span class="msg-error" ng-messages="contactoForm.mensaje.$error" ng-if="contactoForm.mensaje.$touched">
                                <div ng-messages-include="/messages_error.html"></div>
                            </span>
                        </div>
                    </div>

                    <div class="form-group row text-center">
                        <div class="col-sm-12">
                            <button class="btn" id="FormBranding" ng-click="saveDataContact(contacto, contactoForm)" ng-disabled="!(contacto.nombre) || !(contacto.correo) || !(contacto.telefono) || !(contacto.empresa) || !(contacto.mensaje)">Enviar</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-sm"></div>
        </div>
    </section>
    <section id="home-doors-interior">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center interiorPuerta">
                    <img class="logo" src="{{asset('img/logo/concepthaus.svg')}}">
                </div>
                <div class="col-md-6 text-center info-descripBranding">
                    <p class="text-small small-gray text-left">
                        <span class="c-grayLight">+ Benchmarking.</span>
                        Realizamos un análisis de la competencia.
                    </p>
                    <p class="text-small small-gray text-left">
                        <span class="c-grayLight">+ Naming.</span>
                        Creamos propuestas únicas y creativas de posibles nombres hasta llegar al nombre ideal para el negocio; siempre tomando en cuenta su viabilidad de registro ante el IMPI.
                    </p>
                    <p class="text-small small-gray text-left">
                        <span class="c-grayLight">+ Concepto creativo.</span>
                        Creamos un concepto que refleje el core del negocio, los elementos visuales que aluden al nombre y los valores a comunicar.
                    </p>
                </div>
                <div class="col-md-6 text-center info-descripBranding">
                    <p class="text-small small-gray text-left">
                        <span class="c-grayLight">+ Propuestas de identidad corporativa.</span>
                        Se generan 3 diferentes caminos gráficos justificados creativamente; a partir de la versión seleccionada por el cliente se realizan las diferentes aplicaciones gráficas previamente acordadas.
                    </p>
                    <p class="text-small small-gray text-left">
                        <span class="c-grayLight">+ Manual de identidad.</span>
                        Construimos un manual de identidad en donde definimos la forma en que se comporta gráficamente nuestra identidad en sus diferentes aplicaciones on y offline. Sus usos y restricciones, pantones, patronajes, tipografías, áreas de protección, etc.
                    </p>
                    <p class="text-small small-gray text-left">
                        <span class="c-grayLight">+ Slogan.</span>
                        Cuando la marca lo requiere, se propone una frase a través de la cual se comunica de manera puntual, amigable y atractiva los valores principales de la marca.
                    </p>
                    <p class="text-small small-gray text-left">
                        <span class="c-grayLight">+ Registro de marca.</span>
                        Realizamos el proceso de registro en la clase correspondiente ante el Instituto Mexicano de Propiedad Intelectual, por sus siglas IMPI.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section id="plug">
        <a href="{{ url('/branding/#contact') }}">
            <div class="plug-content text-center">
                <img src="{{asset('img/home-elements/Contacto_Haus.png')}}" />
                <img class="top" src="{{asset('img/home-elements/Contacto_Haus2.png')}}" />
            </div>
        </a>
    </section>
    <section id="gridInterior" class="container-fluid">
        <div class="row">
            <div class="col-md-3" ng-repeat="project in collectionConcept | filter:{ fields: 'Branding' }" style="padding: 0;">
                <div class="containerProject">
                    <a class="projectName" href="<% project.url %>" target="_blank">
                        <img class="card-img-top" ng-src="<% project.covers.original %>">
                        <div class="containerInfo">
                            <h2> <% project.name %></h2>
                            <p class="projectCliente">
                                <span ng-repeat="field in project.fields">
                                    <% field %>
                                </span>
                            </p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection