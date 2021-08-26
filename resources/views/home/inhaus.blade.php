
  @extends('layouts.app')
  @section('content')

  <div ng-controller="ProyectosController">
    <section id="videoin">
    
     <script src="https://fast.wistia.com/embed/medias/9wfph8zy79.jsonp" async></script><script src="https://fast.wistia.com/assets/external/E-v1.js" async></script><div class="wistia_responsive_padding" style="padding:56.25% 0 0 0;position:relative;"><div class="wistia_responsive_wrapper" style="height:100%;left:0;position:absolute;top:0;width:100%;"><div class="wistia_embed wistia_async_9wfph8zy79 videoFoam=true" style="height:100%;position:relative;width:100%">&nbsp;</div></div></div>
       
       {{-- <video playsinline="playsinline" autoplay="autoplay" muted="muted" loop="loop" 
            style="">
            <source src="{{asset('video/reel_inhaus.mp4')}}" type="video/mp4">
        </video> --}}
    </section>
      <section id="home-doors-interior">
          <div class="container">
              <div class="text-center">
                <img src="{{asset('img/concepthaus-bullet.gif')}}" alt="InHaus Films + Post" width="100">
              </div>
              <div class="row">
                  <div class="col-md-12 text-center interiorPuerta">
                      <img class="puerta" src="{{asset('img/home-elements/doors/inhaus.png')}}">
                      <img class="logo" src="{{asset('img/logo/inhausfilms.svg')}}">
                      <p class="text-small small-gray text-left">
                          <span class="c-grayLight">Inhaus Films + Post.</span>
                          Es nuestra casa productora especializada en producción audiovisual, cine, cortometrajes,
                          comerciales de televisión, video marketing, videos corporativos, videos musicales, fotografía de producto
                          y cobertura de eventos.
                          <br><br>
                          <span class="c-grayLight">Trabajamos con la más alta calidad para cualquier tamaño de producción audiovisual.</span>
                          {{--  Branded Content, Producción cinematográfica, Producción audiovisual, Fotografía profesional, Postproducción.  --}}
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
      <section id="gridInterior" class="container-fluid" ng-controller="WelcomeController">
          {{-- <div class="row">
              <div class="col-md-3" ng-repeat="project in collectionInHaus" style="padding: 0;">
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
              </div> --}}

              <div class="row">
                  {{-- project-animate --}}
                  <div class="col-md-3 w25" ng-repeat="project in collectionInHaus">
                      <div class="containerProject project-effect">
                          <a class="projectName" href="{{url('proyecto/<%project.id%>')}}" target="_self">
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
  </div>
  @endsection
