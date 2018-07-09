@extends('layouts.app')
@section('content')

<div ng-controller="ProyectosController">
    <section id="home-doors-interior">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center interiorPuerta">
                    <img class="puerta" src="{{asset('img/home-elements/doors/concepthaus.png')}}">
                    <img class="logo" src="{{asset('img/logo/concepthaus.svg')}}">
                    <p class="text-small small-gray text-left">
                        <span class="c-grayLight">Concepthaus Creative Agency.</span>
                        Es una casa creativa especializada en estrategias de marketing, branding, campañas publicitarias,
                        creación de identidad corporativa, diseño gráfico, motion graphics,diseño de empaque, programación y
                        diseño de páginas web; e-commerce, desarrollo de aplicaciones, posicionamiento web SEO & SEM, así como la
                        implementación de estrategias de marketing digital, content management y relaciones públicas.
                        <br><br>
                        <span class="c-grayLight" >Amamos a los que se atreven y por eso contamos con un plan de apoyo a emprendedores.</span>
                        {{--  Estrategia creativa, Estrategia de marketing, Identidad corporativa, Diseño gráfico, publicidad (ATL / Digital) Compra
                        de medios, Desarrollo Web, Desarrollo de aplicaciones, Marketing Digital, Producción de contenido, posicionamiento
                        SEO, SEM, Relaciones Públicas, Influencer marketing, eventos corporativos.     font-weight: 800; --}}
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section id="plug">
        <a href="{{ url('/#contact') }}">
            <div class="plug-content text-center">
                <img src="{{asset('img/home-elements/Contacto_Haus.png')}}"/>
                <img class="top" src="{{asset('img/home-elements/Contacto_Haus2.png')}}"/>
            </div>
        </a>
    </section>
    <section id="gridInterior" class="container-fluid">
        <div class="row">
            <div class="col-md-3" ng-repeat="project in collectionConcept" style="padding: 0;">
                <div class="containerProject">
                    <a class="projectName" href="<% project.url %>" target="_blank">
                        <img class="card-img-top" ng-src="<% project.covers.original %>">
                        <div class="containerInfo">
                            <h2> <% project.name %> </h2>
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
