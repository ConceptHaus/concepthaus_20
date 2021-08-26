@extends('layouts.app')
@section('content')

<div ng-controller="ProyectosController">
    <section id="home-doors-interior">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center interiorPuerta">
                    <img class="puerta" src="{{asset('img/home-elements/doors/treehaus.png')}}">
                    <img class="logo" src="{{asset('img/logo/treehaus.svg')}}">
                    <p class="text-small small-gray text-left">
                        <span class="c-grayLight">TreeHaus Sustainability.</span>
                        Es una casa enfocada en el desarrollo de conceptos y estrategias que pretendan tener un impacto positivo a nivel económico, social y/o ambiental (Green Marketing).
                        {{--  Campañas y proyectos de corte social y/o ecológico, Proyectos digitales en pro de la sustentabilidad.   --}}
                    </p>
                    <ul class="text-small small-gray text-left">
                        <li class="list">Construimos plataformas digitales que favorecen al medio ambiente, la economía y a la sociedad.</li>
                        <li class="list">Desarrollamos estrategias de Green Marketing que procuran el crecimiento de organizaciones enfocadas en
                        sustentabilidad ambiental y social, con la finalidad de mejorar su imagen, difusión y crecimiento económico.</li>
                        <li class="list">Creamos campañas de Awareness en temas como: responsabilidad social, sustentabilidad empresarial,
                        concientización ecológica e impacto ambiental.</li>
                        <li class="list">Desarrollamos estrategias de crowdfunding para promover causas sociales y ambientales.</li>
                    </ul>
                    <p class="text-small small-gray text-center">
                        <span class="c-grayLight customLabel">Unimos marcas con causas</span>
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
    <section id="gridInterior" class="container-fluid" ng-controller="WelcomeController">
        <div class="row">
            {{-- project-animate --}}
            <div class="col-md-3 w25" ng-repeat="project in collectionTreeHaus">
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
        {{-- <div class="row">
            <div class="col-md-3" ng-repeat="project in collectionTreeHaus" style="padding: 0;">
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
        </div> --}}
    </section>
</div>
@endsection
