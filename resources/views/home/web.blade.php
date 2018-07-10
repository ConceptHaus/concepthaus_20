@extends('layouts.appService') @section('content')

<div id="branding" ng-controller="ProyectosController">
    <section class="contact-web" ng-controller="RegistroController as contacto">
        <div class="row">
            <div class="col-md-6">
                <h4 class="title-general c-gray">Web and app development</h4>
            </div>
            <div class="col-md-6">
                <form id="contactoForm" name="contactoForm">
                    {{ csrf_field() }}
                    <input type="text" class="form-control" id="fuente" name="fuente" ng-model="contacto.fuente" ng-init="contacto.fuente='Google'"
                        hidden required>
                    <input type="text" class="form-control" id="tipo" name="tipo" ng-model="contacto.tipo" ng-init="contacto.tipo='Web'"
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
                        <span class="c-grayLight">+ Desarrollo de páginas web.</span>
                        Diseñamos <b>sitios web</b> 100% responsive, lo que significa que se adaptan a cualquier dispositivo para brindarle al usuario una navegación rápida y agradable. Nuestros <b>programadores</b> cuentan con una amplia experiencia en el <b>diseño de páginas web</b> y constantemente se actualizan con las últimas tendencias en <b>programación web</b>.
                    </p>
                    <p class="text-small small-gray text-left">
                        <span class="c-grayLight">+ Landing Page.</span>
                        Desarrollamos micrositios enfocados a la captación de clientes potenciales y/o a promocionar productos y servicios a través del marketing directo. Los clientes estarán a un clic de distancia de su oferta.
                    </p>
                    
                </div>
                <div class="col-md-6 text-center info-descripBranding">
                    <p class="text-small small-gray text-left">
                        <span class="c-grayLight">+ E - Commerce.</span>
                        Creamos una tienda virtual a fin de que el usuario pueda realizar compras en línea desde el dispositivo que desee. Una página de comercio electrónico sin duda le ayudará a incrementar la rentabilidad de su negocio.
                    </p>
                    <p class="text-small small-gray text-left">
                        <span class="c-grayLight">+ Desarrollo de apps.</span>
                        Ofrecemos la más alta tecnología en términos de desarrollo de aplicaciones para celular en los sistemas operativos Android y iOS.
                    </p>
                    
                    <p class="text-small small-gray text-left">
                        <span class="c-grayLight">+ Sitio Informativo.</span>
                        Desarrollamos sitios web que muestran los valores y servicios que ofrece una empresa de manera clara y eficiente, motivando así al contacto y a la generación de leads.
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
            <div class="col-md-3" ng-repeat="project in collectionConcept | filter:{ fields: 'Web' }" style="padding: 0;">
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
    </section>
</div>
@endsection