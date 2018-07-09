@extends('layouts.app')
@section('content')

<section id="startup" ng-controller="WelcomeController">
    <h2 class="title-general c-gray">Our startups</h2>
    <div class="container-fluid gridStartups">
        <div class="row">
            <div class="col-md-4 w50 containerProject" ng-repeat="project in projects" ng-if="project.id == '55917115' || project.id == '55918277' || project.id == '55916489'">
                <img class="card-img-top" ng-src="<% project.covers.original %>">
                <div class="containerInfo">
                    <a class="projectName" href="<% project.url %>" target="_blank">
                        <h2><% project.name %></h2>
                    </a>
                    <a class="projectCliente" href="#/proyecto/<% project.id %>">
                        <p>
                            <span ng-repeat="field in project.fields"><% field %></span>
                        </p>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
