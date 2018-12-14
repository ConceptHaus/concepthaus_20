@extends('layouts.appService_en') @section('content')

<div id="branding" ng-controller="ProyectosController">
    <section class="contact-branding" ng-controller="RegistroController as contacto">
        <div class="row">
            <div class="col-md-6">
                <h4 class="title-general c-gray">Naming & Branding</h4>
            </div>
            <div class="col-md-6">
                <form id="contactoForm" name="contactoForm">
                    {{ csrf_field() }}
                    <input type="text" class="form-control" id="fuente" name="fuente" ng-model="contacto.fuente" ng-init="contacto.fuente='Google'"
                        hidden required>
                    <input type="text" class="form-control" id="tipo" name="tipo" ng-model="contacto.tipo" ng-init="contacto.tipo='Branding UK'"
                        hidden required>
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="nombre" name="nombre" ng-model="contacto.nombre" placeholder="Name" required>
                            <span class="msg-error" ng-messages="contactoForm.nombre.$error" ng-if="contactoForm.nombre.$touched">
                                <div ng-messages-include="/messages_error_en.html"></div>
                            </span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <input type="email" class="form-control input-ajust" id="correo" name="correo" ng-model="contacto.correo" placeholder="E-mail" required>
                            <span class="msg-error" ng-messages="contactoForm.correo.$error" ng-if="contactoForm.correo.$touched">
                                <div ng-messages-include="/messages_error_en.html"></div>
                            </span>
                        </div>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="telefono" name="telefono" mask="9999999999" ng-model="contacto.telefono" ng-minlength="8"
                                placeholder="Phone Number" required>
                            <span class="msg-error" ng-messages="contactoForm.telefono.$error" ng-if="contactoForm.telefono.$touched">
                                <div ng-messages-include="/messages_error_en.html"></div>
                            </span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <div isteven-multi-select
                                input-model="listServicies_en"
                                output-model="contacto.outputServicies"
                                button-label="icon name"
                                item-label="icon name maker"
                                tick-property="ticked"
                                class="formNewSelectServicio">
                            </div>
                            <span class="msg-error" ng-messages="contactoForm.outputServicies.$error" ng-if="contactoForm.outputServicies.$touched">
                                <div ng-messages-include="/messages_error_en.html"></div>
                            </span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="empresa" name="empresa" ng-model="contacto.empresa" placeholder="Company name" required>
                            <span class="msg-error" ng-messages="contactoForm.empresa.$error" ng-if="contactoForm.empresa.$touched">
                                <div ng-messages-include="/messages_error_en.html"></div>
                            </span>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-12">
                            <textarea class="form-control" id="mensaje" name="mensaje" ng-model="contacto.mensaje" placeholder="Message" rows="4" required></textarea>
                            <span class="msg-error" ng-messages="contactoForm.mensaje.$error" ng-if="contactoForm.mensaje.$touched">
                                <div ng-messages-include="/messages_error_en.html"></div>
                            </span>
                        </div>
                    </div>

                    <div class="form-group row text-center">
                        <div class="col-sm-12">
                            <button class="btn" id="FormBranding" ng-click="saveDataContact(contacto, contactoForm)" ng-disabled="!(contacto.nombre) || !(contacto.correo) || !(contacto.telefono) || !(contacto.empresa) || !(contacto.outputServicies) || !(contacto.mensaje)">Send</button>
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
                        We provide competition analysis services.
                    </p>
                    <p class="text-small small-gray text-left">
                        <span class="c-grayLight">+ Naming.</span>
                        We create unique and creative naming proposals until we find the perfect business identity; always considering trademarking viability with (no sabemos cuál es el instituto de registro de marca de allá). The UK government
                    </p>
                    <p class="text-small small-gray text-left">
                        <span class="c-grayLight">+ Creative concepts. </span>
                        We create concepts that reflect the core principals of your business, the visual elements thattransmit the essence of the brand, and the values thatyou wish to communicate to your clients.
                    </p>
                </div>
                <div class="col-md-6 text-center info-descripBranding">
                    <p class="text-small small-gray text-left">
                        <span class="c-grayLight">+ Corporate Identity Proposals. </span>
                        We generate 3 different graphic proposals for your brand; taking on board your feedback we select the most adequate proposal and then provide a series of suggestedapplications.
                    </p>
                    <p class="text-small small-gray text-left">
                        <span class="c-grayLight">+ Branding Manual.</span>
                        We build brand and corporate identity manuals where we define the behaviour of the business identity throughout different applications, bothon and offline. Its uses, restrictions, colours, pattern design, typography, exclusion zones, etc.
                    </p>
                    <p class="text-small small-gray text-left">
                        <span class="c-grayLight">+ Slogan.</span>
                        Building on the brands requirements, we propose a phrase that delivers the brand values and customer value proposition in a clear, friendly and attractive way.
                    </p>
                    {{-- <p class="text-small small-gray text-left">
                        <span class="c-grayLight">+ Trademark & Brand Registration.</span>
                        We carry out the corresponding trademark and brand registration processes at the Mexican Institute for Intelectual Property.
                    </p> --}}
                </div>
            </div>
        </div>
    </section>

    <section id="plug">
        <a href="{{ url('uk/branding/#contact') }}">
            <div class="plug-content text-center">
                <img src="{{asset('img/home-elements/Contacto_Haus.png')}}" />
                <img class="top" src="{{asset('img/home-elements/Contacto_Haus2.png')}}" />
            </div>
        </a>
    </section>
    <section id="gridInterior" class="container-fluid" ng-controller="WelcomeController">

        <div class="row">
            <!-- project-animate -->
            <div class="col-md-3 w25" ng-repeat="project in collectionConcept | filter:{ fields: 'Branding' }">
                <div class="containerProject project-effect">
                    <a class="projectName" href="{{url('proyecto/<%project.id%>')}}" target="_self">
                        <figure class="effect-goliath">
                            <img ng-src="<% project.covers.original %>" />
                            <figcaption>
                                <p class="projectCliente">
                                    <span class="title">
                                        <% project.name %>
                                    </span>
                                    <br>
                                    <span ng-repeat="field in project.fields">
                                        <% field %>
                                    </span>
                                </p>
                            </figcaption>
                        </figure>
                    </a>
                </div>
            </div>
        </div>

    </section>
</div>
@endsection
