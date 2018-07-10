@extends('layouts.appService') @section('content')

<div id="branding" ng-controller="ProyectosController">
    <section class="contact-sem" ng-controller="RegistroController as contacto">
        <div class="row">
            <div class="col-md-6">
                <h4 class="title-general c-gray">Google Advertising Platforms and Social Ads, SEM</h4>
            </div>
            <div class="col-md-6">
                <form id="contactoForm" name="contactoForm">
                    {{ csrf_field() }}
                    <input type="text" class="form-control" id="fuente" name="fuente" ng-model="contacto.fuente" ng-init="contacto.fuente='Google'"
                        hidden required>
                    <input type="text" class="form-control" id="tipo" name="tipo" ng-model="contacto.tipo" ng-init="contacto.tipo='SEM'"
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
                            <div isteven-multi-select
                                input-model="listServicies"
                                output-model="contacto.outputServicies"
                                button-label="icon name"
                                item-label="icon name maker"
                                tick-property="ticked"
                                class="formNewSelectServicio">
                            </div>
                            <span class="msg-error" ng-messages="contactoForm.outputServicies.$error" ng-if="contactoForm.outputServicies.$touched">
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
                            <button class="btn" id="FormBranding" ng-click="saveDataContact(contacto, contactoForm)" ng-disabled="!(contacto.nombre) || !(contacto.correo) || !(contacto.telefono) || !(contacto.empresa) || !(contacto.outputServicies) || !(contacto.mensaje)">Enviar</button>
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
                        <span class="c-grayLight">+ Google Advertising Platforms.</span>
                        Implementamos todo tipo de campañas de marketing digital a través de herramientas como Google Adwords, Google Shopping, Google Display, Google Gmail, Remarketing, Push notifications, Facebook Ads, etc. Así como estrategias de anuncios publicitarios enfocados a reconocimiento de marca y conversión en redes sociales tales como Facebook, LinkedIn,  Instagram, Twitter y Youtube, etc.
                    </p>
                    {{-- <p class="text-small small-gray text-left">
                        <span class="c-grayLight">+ Naming.</span>
                        Creamos propuestas únicas y creativas de posibles nombres hasta llegar al nombre ideal para el negocio; siempre tomando en cuenta su viabilidad de registro ante el IMPI.
                    </p>
                    <p class="text-small small-gray text-left">
                        <span class="c-grayLight">+ Concepto creativo.</span>
                        Creamos un concepto que refleje el core del negocio, los elementos visuales que aluden al nombre y los valores a comunicar.
                    </p> --}}
                </div>
                <div class="col-md-6 text-center info-descripBranding">
                    <p class="text-small small-gray text-left">
                        <span class="c-grayLight">+ Social Ads.</span>
                        Contamos con un equipo de Content producers, Community Managers y Media planners altamente capacitados para crear y gestionar el contenido de una empresa y/o negocio en redes sociales; enfocados al más alto rendimiento de publicidad en Facebook, Instagram y Google.                    </p>
                    {{-- <p class="text-small small-gray text-left">
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
                    </p> --}}
                </div>
            </div>
        </div>
    </section>

    <section id="plug">
        <a href="{{ url('/social-ads/#contact') }}">
            <div class="plug-content text-center">
                <img src="{{asset('img/home-elements/Contacto_Haus.png')}}" />
                <img class="top" src="{{asset('img/home-elements/Contacto_Haus2.png')}}" />
            </div>
        </a>
    </section>
    <section id="clients">
    <h2 class="seo-title-general">
      <img class="img-icon-title" src="{{asset('img/conceptRight.svg')}}" alt="ConceptHaus"> Clientes
    </h2>
    <div class="row text-center align-items-center">
      <div class="col-sm-6 col-md-2">
        <img src="{{asset('img/clients/citibanamex.svg')}}" class="client-brand brand1" alt="Concept Haus / Citibanamex">
      </div>
      <div class="col-sm-6 col-md-2">
        <img src="{{asset('img/clients/myst.svg')}}" class="client-brand brand2" alt="Concept Haus / Baco">
      </div>
      <div class="col-sm-6 col-md-2">
        <img src="{{asset('img/clients/soulcore.svg')}}" class="client-brand brand3" alt="Concept Haus / Soulcore">
      </div>
      <div class="col-sm-6 col-md-2">
        <img src="{{asset('img/clients/tinkerlink.png')}}" class="client-brand brand4" alt="Concept Haus / Fox">
      </div>
      <div class="col-sm-6 col-md-2">
        <img src="{{asset('img/clients/nationalgeo.svg')}}" class="client-brand brand5" alt="Concept Haus / National Geography">
      </div>
      <div class="col-sm-6 col-md-2">
        <img src="{{asset('img/clients/origenes.svg')}}" class="client-brand brand6" alt="Concept Haus / The Walking Dead">
      </div>
      <div class="col-sm-6 col-md-2">
        <img src="{{asset('img/clients/salvajetentacion.svg')}}" class="client-brand brand7" alt="Concept Haus / Fox Sports">
      </div>
      <div class="col-sm-6 col-md-2">
        <img src="{{asset('img/clients/draft.svg')}}" class="client-brand brand8" alt="Concept Haus / Discovery">
      </div>
      <div class="col-sm-6 col-md-2">
        <img src="{{asset('img/clients/totalplay.svg')}}" class="client-brand brand11" alt="Concept Haus / Clarasol">
      </div>
      <div class="col-sm-6 col-md-2">
        <img src="{{asset('img/clients/chilimbalam.svg')}}" class="client-brand brand12" alt="Concept Haus / Chilim Balam">
      </div>
    </div>
  </section>
    {{-- <section id="gridInterior" class="container-fluid">
        <div class="row">
            <div class="col-md-3" ng-repeat="project in collectionConcept | filter:{ fields: 'Branding' }" style="padding: 0;">
                <div class="containerProject">
                    <a class="projectName" href="{{ url('/proyecto/<%project.id%>') }}" target="_blank">
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
    </section> --}}
</div>
@endsection