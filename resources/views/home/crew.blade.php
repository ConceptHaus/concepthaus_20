@extends('layouts.app')

@section('content')

<h2 class="title-general c-gray">Crew</h2>
<section id="crew" ng-controller="CrewController">
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-6 col-md-3 containerPicture" ng-repeat="x in crew" style="background-image: url('<% x.foto %>');">
        <div class="infoCrew">
          <p>
            <span><% x.puesto %></span>
            <% x.nombre %><br>
            <img src="{{asset('img/conceptLlogoWhite.svg')}}" class="" alt="Concept Haus" width="25">
          </p>
        </div>
      </div>
    </div>
  </div>
</section>

@endsection