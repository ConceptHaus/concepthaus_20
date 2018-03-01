@extends('layouts.app') 
@section('content')

<div ng-controller="ProyectosController">
    <section id="home-doors-interior">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center interiorPuerta">
                    <img class="puerta" src="{{asset('img/home-elements/door3.png')}}">
                    <img class="logo" src="{{asset('img/logo/treehaus.svg')}}">
                    <p class="text-small small-gray text-left">
                        <span class="c-grayLight">Treehaus Sustainability.</span> 
                        Campañas y proyectos de corte social y/o ecológico, Proyectos digitales en pro de la sustentabilidad. 
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
        </div>
    </section>
</div>
@endsection