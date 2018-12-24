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
        <div class="nombre row row-flex row-flex-wrap c-gray">
          <div class="col-md-6">
            <p><img class="img-icon-publicidad" src="{{asset('img/conceptRight.svg')}}" alt="ConceptHaus"><%nombre%></p>
          </div>
          <div class="col-md-6 text-right">
            <span ng-repeat="etiqueta in etiquetas"><%etiqueta%>&nbsp</span>
          </div>
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
