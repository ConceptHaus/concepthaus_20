@extends('layouts.app')
@section('content')

<section id="startup" ng-controller="WelcomeController">
<h2 class="title-general">
                    <img class="img-icon-title" src="{{asset('img/conceptRight.svg')}}" alt="ConceptHaus"> Our startups
                </h2>
    <div class="container-fluid gridStartups">

        <div class="row">
            {{-- project-animate --}}
            <div class="col-md-4 w25" ng-repeat="project in projects" ng-if="project.id == '55917115' || project.id == '55918277' || project.id == '55916489'">
                <div class="containerProject project-effect">
                    <a class="projectName" href="<% project.url %>" target="_blank">
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
        
    </div>
</section>

@endsection
