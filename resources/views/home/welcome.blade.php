@extends('layouts.app')

@section('content')

<div ng-controller="WelcomeController" ng-cloak>
<!-- Section | Panorama -->
<div id="panorama">
<span class="word p-bottom-left"><% randomWords[0].word %></span>
    <img src="{{asset('img/backgrounds/panorama-gray.jpg')}}">
  </div>
  <!-- Section | Home Description -->
  <section id="home-description">
    <div class="row content-description small-gray">
      <div class="col-sm-12 col-md-6">
        <img class="acentoHome" src="{{asset('img/concept.svg')}}" alt="" width="100">
        <p>Somos un cluster creativo especializado en la creación, desarrollo y fortalecimiento de marca compuesta por tres empresas
          hermanas: Concepthaus creative agency, Inhaus Films y Treehaus sustentabilidad. Contamos con un equipo integral de
          expertos en cada área.</p>
      </div>
      <div class="col-sm-12 col-md-6 text-right">
        <h2 class="accenting first">
          <span class="c-gray">Accenting </span>
          <span class="c-red">everything</span>
        </h2>
        <p>
          <span class="c-grayLight">Concepthaus Creative Agency.</span> Estrategia creativa, Estrategia de marketing, Identidad corporativa, publicidad
          (ATL / Digital) Compra de medios, Desarrollo Web, Desarrollo de aplicaciones, Marketing Digital, Producción de contenido,
          posicionamiento SEO, SEM, Relaciones Públicas, Influencer marketing, eventos.
        </p>
        <p>
          <span class="c-grayLight">Inhaus Films + Post.</span> Branded Content, Producción cinematográfica, Producción audiovisual, Fotografía profesional,
          Postproducción.
        </p>
        <p>
          <span class="c-grayLight">Treehaus Sustainability.</span> Campañas y proyectos de corte social y/o ecológico, Proyectos digitales en pro
          de la sustentabilidad.
        </p>
      </div>
    </div>
  </section>
  <!-- Section | Home Doors -->
  <section id="home-doors">
    <div class="container">
      <div class="row">
        <div class="col-sm-12 col-md-4">
          <a href="{{ url('/conceptHaus') }}">
            <img src="{{asset('img/home-elements/doors/concepthaus.png')}}" class="door img-fluid mx-auto d-block" alt="ConceptHaus" width="50%">
          </a>
          <img src="{{asset('img/logo/concepthaus.svg')}}" class="logo mx-auto d-block" alt="ConceptHaus">
        </div>
        <div class="col-sm-12 col-md-4">
          <a href="{{ url('/inhaus') }}">
            <img src="{{asset('img/home-elements/doors/inhaus.png')}}" class="door img-fluid mx-auto d-block" alt="InHaus Films" width="50%">
            <img src="{{asset('img/logo/inhausfilms.svg')}}" class="logo mx-auto d-block" alt="InHaus">
          </a>
        </div>
        <div class="col-sm-12 col-md-4">
          <a href="{{ url('/treehaus') }}">
            <img src="{{asset('img/home-elements/doors/treehaus.png')}}" class="door img-fluid mx-auto d-block" alt="TreeHouse" width="50%">
          </a>
          <img src="{{asset('img/logo/treehaus.svg')}}" class="logo mx-auto d-block" alt="TreeHaus">
        </div>
      </div>
    </div>
  </section>
  <!-- Section | Home Plug -->
  <section id="plug">
    <a href="{{ url('/#contact') }}">
    <div class="plug-content text-center">
      <img src="{{asset('img/home-elements/Contacto_Haus.png')}}" />
      <img class="top" src="{{asset('img/home-elements/Contacto_Haus2.png')}}"/>
    </div>
    </a>
  </section>
  <!-- Projects -->
  <section id="homeProjects" class="container-fluid">
    <div class="row">
      <div class="col-sm-12">
      <h2 class="title-general c-gray">Proyectos</h2>
      </div>
    </div>
    <div class="row">
      <!-- ChilimBalam -->
      <div class="col-md-6 w50">
        <div class="containerProject" ng-repeat="project in projects" ng-if="project.id == '60761857'">
          <a class="projectName" href="<% project.url %>" target="_blank">
            <img class="card-img-top" ng-src="<% project.covers.original %>">
            <div class="containerInfo">
              <h2><% project.name %></h2>
              <p class="projectCliente"><span ng-repeat="field in project.fields"><% field %></span></p>
            </div>
          </a>
        </div>
      </div>
      <!-- Discovery Kids && Sistema Eco -->
      <div class="col-md-3 w25">
        <div class="containerProject" ng-repeat="project in projects" ng-if="project.id == '61179187' || project.id == '56727549'">
          <a class="projectName" href="<% project.url %>" target="_blank">
            <img class="card-img-top" ng-src="<% project.covers.original %>">
            <div class="containerInfo">
              <h2><% project.name %></h2>
              <p><span ng-repeat="field in project.fields"><% field %></span></p>
            </div>
          </a>
        </div>
      </div>
      <!-- Clarasol && Fox/Latinoamérica -->
      <div class="col-md-3 w25">
        <div class="containerProject" ng-repeat="project in projects" ng-if="project.id == '55916489' || project.id == '56050953'">
          <a class="projectName" href="<% project.url %>" target="_blank">
            <img class="card-img-top" ng-src="<% project.covers.original %>">
            <div class="containerInfo">
              <h2><% project.name %></h2>
              <p><span ng-repeat="field in project.fields"><% field %></span></p>
            </div>
          </a>
        </div>
      </div>
    </div>
    <div class="row">
      <!-- Zaxic && El Encanto -->
      <div class="col-md-3 w25">
        <div class="containerProject" ng-repeat="project in projects" ng-if="project.id == '55917115' || project.id == '55916457'">
          <a class="projectName" href="<% project.url %>" target="_blank">
            <img class="card-img-top" ng-src="<% project.covers.original %>">
            <div class="containerInfo">
              <h2><% project.name %></h2>
              <p><span ng-repeat="field in project.fields"><% field %></span></p>
            </div>
          </a>
        </div>
      </div>
      <!-- The Walking Dead && Zayrik -->
      <div class="col-md-3 w25">
        <div class="containerProject" ng-repeat="project in projects" ng-if="project.id == '60762011' || project.id == '56725201'">
          <a class="projectName" href="<% project.url %>" target="_blank">
            <img class="card-img-top" ng-src="<% project.covers.original %>">
            <div class="containerInfo">
              <h2><% project.name %></h2>
              <p><span ng-repeat="field in project.fields"><% field %></span></p>
            </div>
          </a>
        </div>
      </div>
      <!-- Petmail -->
      <div class="col-md-6 w50">
        <div class="containerProject" ng-repeat="project in projects" ng-if="project.id == '55918277'">
          <a class="projectName" href="<% project.url %>" target="_blank">
            <img class="card-img-top" ng-src="<% project.covers.original %>">
            <div class="containerInfo">
              <h2><% project.name %></h2>
              <p><span ng-repeat="field in project.fields"><% field %></span></p>
            </div>
          </a>
        </div>
      </div>
    </div>

    <div class="row">
        <!-- Myst -->
        <div class="col-md-6 w50">
          <div class="containerProject" ng-repeat="project in projects" ng-if="project.id == '55917031'">
            <a class="projectName" href="<% project.url %>" target="_blank">
              <img class="card-img-top" ng-src="<% project.covers.original %>">
              <div class="containerInfo">
                <h2><% project.name %></h2>
                <p class="projectCliente"><span ng-repeat="field in project.fields"><% field %></span></p>
              </div>
            </a>
          </div>
        </div>
        <div class="col-md-3 w25">
          <!-- La aldea &&  Orígenes Orgánicos -->
          <div class="containerProject" ng-repeat="project in projects" ng-if="project.id == '62011457' || project.id == '61222067'">
            <a class="projectName" href="<% project.url %>" target="_blank">
              <img class="card-img-top" ng-src="<% project.covers.original %>">
              <div class="containerInfo">
                <h2><% project.name %></h2>
                <p><span ng-repeat="field in project.fields"><% field %></span></p>
              </div>
            </a>
          </div>
        </div>
        <div class="col-md-3 w25">
          <!-- Harlekin &&  Portamar -->
          <div class="containerProject" ng-repeat="project in projects" ng-if="project.id == '62568395' || project.id == '62011497'">
            <a class="projectName" href="<% project.url %>" target="_blank">
              <img class="card-img-top" ng-src="<% project.covers.original %>">
              <div class="containerInfo">
                <h2><% project.name %></h2>
                <p><span ng-repeat="field in project.fields"><% field %></span></p>
              </div>
            </a>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-3 w25">
          <!-- Fox Life && Querametik -->
          <div class="containerProject" ng-repeat="project in projects" ng-if="project.id == '56049371' || project.id == '62568375'">
            <a class="projectName" href="<% project.url %>" target="_blank">
              <img class="card-img-top" ng-src="<% project.covers.original %>">
              <div class="containerInfo">
                <h2><% project.name %></h2>
                <p><span ng-repeat="field in project.fields"><% field %></span></p>
              </div>
            </a>
          </div>
        </div>
        <div class="col-md-3 w25">
          <!-- Equo && NFL -->
          <div class="containerProject" ng-repeat="project in projects" ng-if="project.id == '62011409' || project.id == '56724979'">
            <a class="projectName" href="<% project.url %>" target="_blank">
              <img class="card-img-top" ng-src="<% project.covers.original %>">
              <div class="containerInfo">
                <h2><% project.name %></h2>
                <p><span ng-repeat="field in project.fields"><% field %></span></p>
              </div>
            </a>
          </div>
        </div>
        <div class="col-md-6 w50">
          <!-- Baco -->
          <div class="containerProject" ng-repeat="project in projects" ng-if="project.id == '61179151'">
            <a class="projectName" href="<% project.url %>" target="_blank">
              <img class="card-img-top" ng-src="<% project.covers.original %>">
              <div class="containerInfo">
                <h2><% project.name %></h2>
                <p><span ng-repeat="field in project.fields"><% field %></span></p>
              </div>
            </a>
          </div>
        </div>
      </div>
  </section>
  <section id="clients">
    <h2 class="title-general">Clientes</h2>
    <div class="row text-center align-items-center">
      <div class="col-sm-6 col-md-2">
        <img src="{{asset('img/clients/citibanamex.svg')}}" class="client-brand" alt="Concept Haus / Citibanamex">
      </div>
      <div class="col-sm-6 col-md-2">
        <img src="{{asset('img/clients/corona.svg')}}" class="client-brand" alt="Concept Haus / Corona">
      </div>
      <div class="col-sm-6 col-md-2">
        <img src="{{asset('img/clients/foxSports.svg')}}" class="client-brand" alt="Concept Haus / Fox Sports">
      </div>
      <div class="col-sm-6 col-md-2">
        <img src="{{asset('img/clients/fox.svg')}}" class="client-brand" alt="Concept Haus / Fox">
      </div>
      <div class="col-sm-6 col-md-2">
        <img src="{{asset('img/clients/nationalgeo.svg')}}" class="client-brand" alt="Concept Haus / National Geography">
      </div>
      <div class="col-sm-6 col-md-2">
        <img src="{{asset('img/clients/walkingdead.svg')}}" class="client-brand" alt="Concept Haus / The Walking Dead">
      </div>
      <div class="col-sm-6 col-md-2">
        <img src="{{asset('img/clients/myst.svg')}}" class="client-brand" alt="Concept Haus / Myst">
      </div>
      <div class="col-sm-6 col-md-2">
        <img src="{{asset('img/clients/discovery.svg')}}" class="client-brand" alt="Concept Haus / Discovery">
      </div>
      <div class="col-sm-6 col-md-2">
        <img src="{{asset('img/clients/hidalgo.svg')}}" class="client-brand" alt="Concept Haus / Hidalgo">
      </div>
      <div class="col-sm-6 col-md-2">
        <img src="{{asset('img/clients/autoEfectivo.svg')}}" class="client-brand" alt="Concept Haus / Auto Efectivo">
      </div>
      <div class="col-sm-6 col-md-2">
        <img src="{{asset('img/clients/clarasol.svg')}}" class="client-brand" alt="Concept Haus / Clarasol">
      </div>
      <div class="col-sm-6 col-md-2">
        <img src="{{asset('img/clients/chilimbalam.svg')}}" class="client-brand" alt="Concept Haus / Chilim Balam">
      </div>
    </div>
  </section>
</div>

@endsection