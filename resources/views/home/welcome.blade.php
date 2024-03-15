@extends('layouts.app')

@section('content')
<style>

  .effect-goliath{
    heigh: 312px !important;
  }

</style>
<div ng-controller="WelcomeController" ng-cloak>
  <!-- Section | Home Description -->
  <section id="home-description">
    <div class="row content-description small-gray">
      <div class="col-sm-12 col-md-6" style="padding-top: 9px;">
        {{-- <img class="acentoHome" src="{{asset('img/concept.svg')}}" alt="" width="100"> --}}
        {{-- <span class="word p-bottom-left"><% randomWords[0].word %></span> --}}
        {{-- <span class="word p-bottom-left">Concepthaus</span> --}}
        <p class="description-p c-gray">Somos un clúster creativo especializado en la conceptualización, desarrollo y fortalecimiento de marca compuesto
          por tres empresas hermanas. ConceptHaus: <b>agencia de branding, publicidad, marketing e interiorismo</b>, InHaus Films: <b>casa productora</b> y TreeHaus:
          consultoría de responsabilidad social y empresarial a favor de la <b>sustentabilidad</b>.</p>
      </div>
      <div class="col-sm-12 col-md-6 text-right c-gray">
        <h2 class="accenting first">
          <span class="c-gray">Accenting </span>
          <span class="c-red">everything</span>
        </h2>
        {{-- <p>
          Concepthaus Creative Agency. Estrategia creativa, Estrategia de marketing, Identidad corporativa, publicidad
          (ATL / Digital) Compra de medios, Desarrollo Web, Desarrollo de aplicaciones, Marketing Digital, Producción de contenido,
          posicionamiento SEO, SEM, Relaciones Públicas, Influencer marketing, eventos.
        </p>
        <p>
          Inhaus Films + Post. Branded Content, Producción cinematográfica, Producción audiovisual, Fotografía profesional,
          Postproducción.
        </p>
        <p>
          Treehaus Sustainability. Campañas y proyectos de corte social y/o ecológico, Proyectos digitales en pro
          de la sustentabilidad.
        </p> --}}
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
  <!-- Section | Projects -->
  <section id="homeProjects" class="container-fluid">
    <div class="row">
      <div class="col-sm-12">
      <h2 class="title-general">
        <img class="img-icon-title" src="{{asset('img/conceptRight.svg')}}" alt="ConceptHaus"> Proyectos
      </h2>
      </div>
    </div>

    <div class="row foo-1">
      <!-- ChilimBalam  && Equo-->
      <!-- <div class="col-md-3 w25 project-animate-3">
        <div class="containerProject project-effect" ng-repeat="project in projects" ng-if="project.id == '60761857' || project.id == '62568375'">
          <a class="projectName" href="{{url('proyecto/<%project.id%>')}}" target="_self">
          
            <figure class="effect-goliath">
              <img ng-src="<% project.covers.original %>"/>
              <figcaption>
                <p class="projectCliente">
                  <span class="title"><% project.name %>dsafasdfsf</span> <br>
                  <span ng-repeat="field in project.fields"><% field %></span>
                </p>
              </figcaption>
            </figure>
          </a>
        </div>
      </div> -->

      <!-- Discovery Kids && Sistema Eco -->
      <!--Sistema Eco &&-->
      <!--project.id == '55918277'-->

      <!-- <div class="col-md-3 w25 project-animate-3">
        <div class="containerProject project-effect" ng-repeat="project in projects" ng-if="project.id == '61179187' || project.id == '55918277'">
          <a class="projectName" href="{{url('proyecto/<%project.id%>')}}" target="_self">
          
            <figure class="effect-goliath">
              <img ng-src="<% project.covers.original %>"/>
              <figcaption>
                <p class="projectCliente">
                  <span class="title"><% project.name %>dsafasdfsf</span> <br>
                  <span ng-repeat="field in project.fields"><% field %></span>
                </p>
              </figcaption>
            </figure>
          </a>
        </div>
      </div> -->

      <!-- <div class="col-md-3 w25 project-animate-3">
        <div class="containerProject project-effect" ng-repeat="project in projects" ng-if="project.id == '61179187' || project.id == '55918277'">
            <a class="projectName" href="{{url('proyecto/<%project.id%>')}}"  target="_self">
              <figure class="effect-goliath">
                <img ng-src="<% project.covers.original %>"/>
                <figcaption>
                  <p class="projectCliente">
                    <span class="title"><% project.name %></span> <br>
                    <span ng-repeat="field in project.fields"><% field %></span>
                  </p>
                </figcaption>
              </figure>
            </a>
        </div>
      </div> -->
      
      <!--Estos chilim balam y sistema co-->

      <div class="col-md-3 w25 project-animate-3">
        <div class="containerProject project-effect" ng-repeat="project in projects" ng-if="project.id == '55916489' || project.id == '60761857'">
            <a class="projectName" href="{{url('proyecto/<%project.id%>')}}" target="_self">
              <figure class="effect-goliath">
                <img ng-src="<% project.covers.original %>"/>
                <figcaption>
                  <p class="projectCliente">
                    <span class="title"><% project.name %></span> <br>
                    <span ng-repeat="field in project.fields"><% field %></span>
                  </p>
                </figcaption>
              </figure>
            </a>
        </div>
      </div>
      
      <!-- Zaxic && El EQUO -->
      <div class="col-md-3 w25 project-animate-3">
        <div class="containerProject project-effect" ng-repeat="project in projects" ng-if="project.id == '55917115' || project.id == '62568375'">
            <a class="projectName" href="{{url('proyecto/<%project.id%>')}}" target="_self">
              <figure class="effect-goliath">
                <img ng-src="<% project.covers.original %>"/>
                <figcaption>
                  <p class="projectCliente">
                    <span class="title"><% project.name %></span> <br>
                    <span ng-repeat="field in project.fields"><% field %></span>
                  </p>
                </figcaption>
              </figure>
            </a>
        </div>
      </div>

    <!-- Zaxic && EQUO -->
    <div class="col-md-3 w25 project-animate-3">
        <div class="containerProject project-effect" ng-repeat="project in projects" ng-if="project.id == '60762011' || project.id == '55918277'">
            <a class="projectName" href="{{url('proyecto/<%project.id%>')}}" target="_self">
              <figure class="effect-goliath">
                <img ng-src="<% project.covers.original %>"/>
                <figcaption>
                  <p class="projectCliente">
                    <span class="title"><% project.name %></span> <br>
                    <span ng-repeat="field in project.fields"><% field %></span>
                  </p>
                </figcaption>
              </figure>
            </a>
        </div>
      </div>
      <!-- Origenes organicos && La La aldea -->
    <div class="col-md-3 w25 project-animate-3">
        <div class="containerProject project-effect" ng-repeat="project in projects" ng-if="project.id == '61222067' || project.id == '62568395'">
            <a class="projectName" href="{{url('proyecto/<%project.id%>')}}" target="_self">
              <figure class="effect-goliath">
                <img ng-src="<% project.covers.original %>"/>
                <figcaption>
                  <p class="projectCliente">
                    <span class="title"><% project.name %></span> <br>
                    <span ng-repeat="field in project.fields"><% field %></span>
                  </p>
                </figcaption>
              </figure>
            </a>
        </div>
      </div>
      <!-- Baco -->
      <div class="col-md-3 w25 project-animate-3">
        <div class="containerProject project-effect" ng-repeat="project in projects" ng-if="project.id == '61179151'">
            <a class="projectName" href="{{url('proyecto/<%project.id%>')}}" target="_self">
              <figure class="effect-goliath">
                <img ng-src="<% project.covers.original %>"/>
                <figcaption>
                  <p class="projectCliente">
                    <span class="title"><% project.name %></span> <br>
                    <span ng-repeat="field in project.fields"><% field %></span>
                  </p>
                </figcaption>
              </figure>
            </a>
        </div>
      </div>
      <!--Harlequin -->
      <div class="col-md-3 w25 project-animate-3">
        <div class="containerProject project-effect" ng-repeat="project in projects" ng-if="project.id == '62011457'">
            <a class="projectName" href="{{url('proyecto/<%project.id%>')}}" target="_self">
              <figure class="effect-goliath">
                <img ng-src="<% project.covers.original %>"/>
                <figcaption>
                  <p class="projectCliente">
                    <span class="title"><% project.name %></span> <br>
                    <span ng-repeat="field in project.fields"><% field %></span>
                  </p>
                </figcaption>
              </figure>
            </a>
        </div>
      </div>
    </div>
        
  </section>
  {{-- clientsServicies --}}
  <section id="clients">
    <h2 class="title-general">
      <img class="img-icon-title" src="{{asset('img/conceptRight.svg')}}" alt="ConceptHaus"> Clientes
    </h2>
    <div class="row text-center align-items-center">
      <div class="col-sm-6 col-md-3 col-lg-2">
        <img src="{{asset('img/clients/citibanamex.svg')}}" class="client-brand brand1" alt="Concept Haus / Citibanamex">
      </div>
      <div class="col-sm-6 col-md-3 col-lg-2">
        <img src="{{asset('img/clients/baco.svg')}}" class="client-brand brand2" alt="Concept Haus / Baco">
      </div>
      <div class="col-sm-6 col-md-3 col-lg-2">
        <img src="{{asset('img/clients/soulcore.svg')}}" class="client-brand brand3" alt="Concept Haus / Soulcore">
      </div>
      <div class="col-sm-6 col-md-3 col-lg-2">
        <img src="{{asset('img/clients/fox.svg')}}" class="client-brand brand4" alt="Concept Haus / Fox">
      </div>
      <div class="col-sm-6 col-md-3 col-lg-2">
        <img src="{{asset('img/clients/nationalgeo.svg')}}" class="client-brand brand5" alt="Concept Haus / National Geography">
      </div>
      <div class="col-sm-6 col-md-3 col-lg-2">
        <img src="{{asset('img/clients/walkingdead.svg')}}" class="client-brand brand6" alt="Concept Haus / The Walking Dead">
      </div>
      <div class="col-sm-6 col-md-3 col-lg-2">
        <img src="{{asset('img/clients/foxSports.svg')}}" class="client-brand brand7" alt="Concept Haus / Fox Sports">
      </div>
      <div class="col-sm-6 col-md-3 col-lg-2">
        <img src="{{asset('img/clients/discovery.svg')}}" class="client-brand brand8" alt="Concept Haus / Discovery">
      </div>
      <div class="col-sm-6 col-md-3 col-lg-2">
        <img src="{{asset('img/clients/hidalgo.svg')}}" class="client-brand brand9" alt="Concept Haus / Hidalgo">
      </div>
      <div class="col-sm-6 col-md-3 col-lg-2">
        <img src="{{asset('img/clients/roberts.svg')}}" class="client-brand brand10" alt="Concept Haus / Roberts">
      </div>
      <div class="col-sm-6 col-md-3 col-lg-2">
        <img src="{{asset('img/clients/clarasol.svg')}}" class="client-brand brand11" alt="Concept Haus / Clarasol">
      </div>
      <div class="col-sm-6 col-md-3 col-lg-2">
        <img src="{{asset('img/clients/chilimbalam.svg')}}" class="client-brand brand12" alt="Concept Haus / Chilim Balam">
      </div>
    </div>
  </section>
</div>

@endsection
