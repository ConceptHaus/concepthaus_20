@extends('layouts.app')
@section('content')
    {{-- <div class="row" style="margin-top: 10%;">
        <div class="col-md-12">
            <h1 class="text-center">Proyecto</h1>
            <!-- <p>{{$details}}</p> -->

             <!-- @foreach ($details as $prueba)
                <p>{{ $prueba }}</p>
            @endforeach  -->

        </div>
    </div> --}}
    <div class="d-flex" style="margin-top:20%;" ng-controller="WelcomeController">
      <div class="container" ng-init="getOneProject({{$id}})">
        <div class="nombre col-lg-8">
          <p><%nombre%></p><span ng-repeat="etiqueta in etiquetas"><%etiqueta%></span>
        </div>

        <div ng-repeat="proy in test">
          <img ng-if="proy.tipo == 'imagen'" class="img-fluid" ng-src="<% proy.url %>" alt="test">
          <div class="container" ng-if="proy.tipo == 'video'">
            <iframe class="video" type="text/html" ng-src="<%proy.url | trusted %>" allowfullscreen frameBorder=0></iframe>
          </div>
        </div>
      </div>
    </div>
@endsection
