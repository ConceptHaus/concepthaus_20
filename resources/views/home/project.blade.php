@extends('layouts.app')
@section('content')
    <div class="d-flex" style="margin-top:10%;" ng-controller="WelcomeController">
      <div class="container" ng-init="getOneProject({{$id}})" ng-cloak>
        <div class="nombre row row-flex row-flex-wrap c-gray">
          <div class="col-md-6">
            <h2 class="title-proyecto"><img class="img-icon-title" src="{{asset('img/conceptRight.svg')}}" alt="ConceptHaus"><%nombre%>&nbsp</h2>
          </div>
          <div class="col-md-6 text-right" style="align-self: center;">
            <span class="tag" ng-repeat="etiqueta in etiquetas"><%etiqueta%>&nbsp</span>
          </div>
        </div>

        <div ng-repeat="proy in test">
          <img ng-if="proy.tipo == 'imagen'" class="img-fluid" ng-src="<% proy.url %>" alt="test">
          <div ng-if="proy.tipo == 'video'">
            <iframe class="video" width="100%" type="text/html" ng-src="<%proy.url | trusted %>" allowfullscreen frameBorder=0></iframe>
          </div>
        </div>
      </div>
    </div>
@endsection
