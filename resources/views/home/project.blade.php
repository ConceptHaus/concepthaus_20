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
    <div class="d-flex" style="margin-top:10%;" ng-controller="WelcomeController">
      <div class="container" ng-init="getOneProject({{$id}})" ng-cloak>
        <div class="nombre row row-flex row-flex-wrap">
          <p ><%nombre%></p><span><%etiqueta%></span>
        </div>

        <div ng-repeat="proy in test">
          <img ng-if="proy.tipo == 'imagen'" class="img-fluid" ng-src="<% proy.url %>" alt="test">
          <div class="container" ng-if="proy.tipo == 'video'">
            <iframe class="video" width="100%" type="text/html" ng-src="<%proy.url | trusted %>" allowfullscreen frameBorder=0></iframe>
          </div>
        </div>
      </div>
    </div>
@endsection
