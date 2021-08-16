@extends('layouts.app')

@section('content')

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



         <div class="container-fluid">
      <!-- Control the column width, and how they should appear on different devices -->
      <div class="row">
        <div class="col-sm-6" >
          <!--ChilimBalam -->
          <div class="containerProject project-effect" ng-repeat="project in projects" ng-if="project.id == '60761857'">
          <a class="projectName" href="{{url('proyecto/<%project.id%>')}}" target="_self">
          <!-- {{ url('/proyecto/<%project.id%>') }} -->
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
        <!-- End chilimBalam -->
        </div>

        <div class="col-sm-6">
          <div class="row">
            <div class="col-sm">
              
              <!-- Discovery Kids-->
              <div class="containerProject project-effect" ng-repeat="project in projects" ng-if="project.id == '61179187' ">
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
              <!-- End Discovery Kids-->

            </div>
            <div class="col-sm">
              
              <!-- Sistema Eco -->
              <div class="containerProject project-effect" ng-repeat="project in projects" ng-if="project.id == project.id == '55916489'">
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
              <!-- End Ssitema Eco -->

            </div>
          </div>
          <div class="row">
            <div class="col-sm">
              
              <!-- Zaxic -->
              <div class="containerProject project-effect" ng-repeat="project in projects" ng-if="project.id == '55917115'">
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
              <!-- End Zaxic -->

            </div>
            <div class="col-sm">
              
              <!--Fox/Latinoamérica -->
              <div class="containerProject project-effect" ng-repeat="project in projects" ng-if="project.id == '56050953'">
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
          <!-- End  Fox/Latinoamérica -->

            </div>
        </div>
      </div>  
      
      <div class="row">        
        <div class="col-sm-6">
          <div class="row">
            <div class="col-sm">
              
              <!--  Zayrik -->
              <div class="containerProject project-effect" ng-repeat="project in projects" ng-if="project.id == '60762011'">
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
              <!--End Zayrik -->

            </div>
            <div class="col-sm">
              
              <!-- The Walking Dead -->
              <div class="containerProject project-effect" ng-repeat="project in projects" ng-if="project.id == '56725201'">
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
              <!-- End The Walking Dead -->

            </div>
          </div>
          <div class="row">
            <div class="col-sm">
              
              <!-- El Encanto -->
              <div class="containerProject project-effect" ng-repeat="project in projects" ng-if="project.id == '55916457'">
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
              <!-- End El Encanto -->

            </div>
            <div class="col-sm">
              
                <!-- Querametik -->
                <div class="containerProject project-effect" ng-repeat="project in projects" ng-if="project.id == '62568375'">
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
                <!-- End Querametik -->

            </div>
          </div>
        </div>  
        <div class="col-sm-6">
          
          <!-- Petmail -->
          <div class="containerProject project-effect" ng-repeat="project in projects" ng-if="project.id == '55918277'">
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
        <!-- End Petmail -->

        </div>
      </div> 


     <div class="row">
        <div class="col-sm-6" >50%</div>
        <div class="col-sm-6">
          <div class="row">
            <div class="col-sm">25%</div>
            <div class="col-sm">25%</div>
          </div>
          <div class="row">
            <div class="col-sm">25%</div>
            <div class="col-sm">25%</div>
          </div>
        </div>      
      </div>

    </div>
    <br>
  
  

    <div class="row foo-1">
      <!-- ChilimBalam -->
      <div class="col-md-6 w50 project-animate">
        <div class="containerProject project-effect" ng-repeat="project in projects" ng-if="project.id == '60761857'">
          <a class="projectName" href="{{url('proyecto/<%project.id%>')}}" target="_self">
          <!-- {{ url('/proyecto/<%project.id%>') }} -->
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
      <!-- Zaxic -->
      <div class="col-md-3 w25 project-animate-2">
        <div class="containerProject project-effect" ng-repeat="project in projects" ng-if="project.id == '55917115'">
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
      
      <!-- Discovery Kids-->
      <div class="col-md-3 w25 project-animate-2">
        <div class="containerProject project-effect" ng-repeat="project in projects" ng-if="project.id == '61179187' ">
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

      <!-- Clarasol -->
      <div class="col-md-3 w25 project-animate-3">
        <div class="containerProject project-effect" ng-repeat="project in projects" ng-if="project.id == project.id == '82735133'">
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
      
      
      
      
      <!-- Clarasol && Fox/Latinoamérica -->
      <!--<div class="col-md-3 w25 project-animate-3">
        <div class="containerProject project-effect" ng-repeat="project in projects" ng-if="project.id == '55916489' || project.id == '56050953'">
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
    </div>-->
    
    
    
    <div class="row foo-2">
      <!-- Zaxic && El Encanto -->
      <div class="col-md-3 w25 project-animate-3">
        <div class="containerProject project-effect" ng-repeat="project in projects" ng-if="project.id == '55917115' || project.id == '55916457'">
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
      <!-- The Walking Dead && Zayrik -->
      <div class="col-md-3 w25 project-animate-2">
        <div class="containerProject project-effect" ng-repeat="project in projects" ng-if="project.id == '60762011' || project.id == '56725201'">
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
      <!-- Petmail -->
      <div class="col-md-6 w50 project-animate">
        <div class="containerProject project-effect" ng-repeat="project in projects" ng-if="project.id == '55918277'">
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

    <div class="row foo-3">
        <!-- Myst -->
        <div class="col-md-6 w50 project-animate">
          <div class="containerProject project-effect" ng-repeat="project in projects" ng-if="project.id == '55917031'">
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
        <div class="col-md-3 w25 project-animate-2">
          <!-- La aldea &&  Orígenes Orgánicos -->
          <div class="containerProject project-effect" ng-repeat="project in projects" ng-if="project.id == '62011457' || project.id == '61222067'">
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
        <div class="col-md-3 w25 project-animate-3">
          <!-- Harlekin &&  Portamar -->
          <div class="containerProject project-effect" ng-repeat="project in projects" ng-if="project.id == '62568395' || project.id == '62011497'">
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
      <div class="row">
        <div class="col-md-3 w25 project-animate-3">
          <!-- Fox Life && Querametik -->
          <div class="containerProject project-effect" ng-repeat="project in projects" ng-if="project.id == '56049371' || project.id == '62568375'">
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
        <div class="col-md-3 w25 project-animate-2">
          <!-- Equo && NFL -->
          <div class="containerProject project-effect" ng-repeat="project in projects" ng-if="project.id == '62011409' || project.id == '56724979'">
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
        <div class="col-md-6 w50 project-animate">
          <!-- Baco -->
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
        <img src="{{asset('img/clients/metlife.svg')}}" class="client-brand brand3" alt="Concept Haus / Soulcore">
      </div>
      <div class="col-sm-6 col-md-3 col-lg-2">
        <img src="{{asset('img/clients/fox.svg')}}" class="client-brand brand4" alt="Concept Haus / Fox">
      </div>
      <div class="col-sm-6 col-md-3 col-lg-2">
        <img src="{{asset('img/clients/nationalgeo.svg')}}" class="client-brand brand5" alt="Concept Haus / National Geography">
      </div>
      <div class="col-sm-6 col-md-3 col-lg-2">
        <img src="{{asset('img/clients/quickbooks.svg')}}" class="client-brand brand6" alt="Concept Haus / The Walking Dead">
      </div>
      <div class="col-sm-6 col-md-3 col-lg-2">
        <img src="{{asset('img/clients/begrand.svg')}}" class="client-brand brand7" alt="Concept Haus / Fox Sports">
      </div>
      <div class="col-sm-6 col-md-3 col-lg-2">
        <img src="{{asset('img/clients/discovery.svg')}}" class="client-brand brand8" alt="Concept Haus / Discovery">
      </div>
      <div class="col-sm-6 col-md-3 col-lg-2">
        <img src="{{asset('img/clients/continental-tyres-logo.svg')}}" class="client-brand brand9" alt="Concept Haus / Hidalgo">
      </div>
      <div class="col-sm-6 col-md-3 col-lg-2">
        <img src="{{asset('img/clients/roberts.svg')}}" class="client-brand brand10" alt="Concept Haus / Roberts">
      </div>
      <div class="col-sm-6 col-md-3 col-lg-2">
        <img src="{{asset('img/clients/Grupo 195.svg')}}" class="client-brand brand11" alt="Concept Haus / Clarasol">
      </div>
      <div class="col-sm-6 col-md-3 col-lg-2">
        <img src="{{asset('img/clients/lomalinda.svg')}}" class="client-brand brand12" alt="Concept Haus / Chilim Balam">
      </div>


      <div class="col-sm-6 col-md-3 col-lg-2">
        <img src="{{asset('img/clients/wordvision.svg')}}" class="client-brand brand12" alt="Concept Haus / Chilim Balam">
      </div>
      <div class="col-sm-6 col-md-3 col-lg-2">
        <img src="{{asset('img/clients/foodin.svg')}}" class="client-brand brand12" alt="Concept Haus / Chilim Balam">
      </div>
      <div class="col-sm-6 col-md-3 col-lg-2">
        <img src="{{asset('img/clients/stack.svg')}}" class="client-brand brand12" alt="Concept Haus / Chilim Balam">
      </div>
      <div class="col-sm-6 col-md-3 col-lg-2">
        <img src="{{asset('img/clients/zaxic.svg')}}" class="client-brand brand12" alt="Concept Haus / Chilim Balam">
      </div>
      <div class="col-sm-6 col-md-3 col-lg-2">
        <img src="{{asset('img/clients/montesori.svg')}}" class="client-brand brand12" alt="Concept Haus / Chilim Balam">
      </div>
      <div class="col-sm-6 col-md-3 col-lg-2">
        <img src="{{asset('img/clients/yiuppi.svg')}}" class="client-brand brand12" alt="Concept Haus / Chilim Balam">
      </div>
    </div>
  </section>
  <section id="clients_movil" class="clients_movil">
    <h2 class="title-general">
      <img class="img-icon-title" src="{{asset('img/conceptRight.svg')}}" alt="ConceptHaus"> Clientes
    </h2>
      <div class="carouselContent_medios">

                        <div id="carouselmedios" class="carousel slidepo" data-ride="carousel">
                            <div class="carousel-inner_medios">
                                <div id="slider1_medios" class="carousel-item active">
                                   
                                    <img class="citibanamex" src="{{asset('img/clients/citibanamex.svg')}}" class="client-brand brand1" alt="Concept Haus / Citibanamex">
                                 
                                </div>
                                <div id="slider1_medios" class="carousel-item">
                                   <img class="baco" src="{{asset('img/clients/baco.svg')}}" class="client-brand brand2" alt="Concept Haus / Baco">
                                </div>
                                <div id="slider1_medios" class="carousel-item">
                                   <img class="metlife" src="{{asset('img/clients/metlife.svg')}}" class="client-brand brand3" alt="Concept Haus / Soulcore">
                                </div>
                                <div id="slider1_medios" class="carousel-item">
                                    <img class="fox" src="{{asset('img/clients/fox.svg')}}" class="client-brand brand4" alt="Concept Haus / Fox">
                                </div>
                                <div id="slider1_medios" class="carousel-item">
                                     <img class="nationalgeo" src="{{asset('img/clients/nationalgeo.svg')}}" class="client-brand brand5" alt="Concept Haus / National Geography">
                                </div>

                                <div id="slider1_medios" class="carousel-item">
                                     <img class="quickbooks" src="{{asset('img/clients/quickbooks.svg')}}" class="client-brand brand5" alt="Concept Haus / National Geography">
                                </div>
                                <div id="slider1_medios" class="carousel-item">
                                     <img class="begrand" src="{{asset('img/clients/begrand.svg')}}" class="client-brand brand5" alt="Concept Haus / National Geography">
                                </div>
                                <div id="slider1_medios" class="carousel-item">
                                     <img class="discovery" src="{{asset('img/clients/discovery.svg')}}" class="client-brand brand5" alt="Concept Haus / National Geography">
                                </div>
                                <div id="slider1_medios" class="carousel-item">
                                     <img class="continental" src="{{asset('img/clients/continental-tyres-logo.svg')}}" class="client-brand brand5" alt="Concept Haus / National Geography">
                                </div>
                                <div id="slider1_medios" class="carousel-item">
                                     <img class="roberts" src="{{asset('img/clients/roberts.svg')}}" class="client-brand brand5" alt="Concept Haus / National Geography">
                                </div>
                                <div id="slider1_medios" class="carousel-item">
                                     <img class="hbo" src="{{asset('img/clients/Grupo 195.svg')}}" class="client-brand brand5" alt="Concept Haus / National Geography">
                                </div>
                                <div id="slider1_medios" class="carousel-item">
                                     <img class="lomalinda" src="{{asset('img/clients/lomalinda.svg')}}" class="client-brand brand5" alt="Concept Haus / National Geography">
                                </div>
                                <div id="slider1_medios" class="carousel-item">
                                     <img class="wordvision" src="{{asset('img/clients/wordvision.svg')}}" class="client-brand brand5" alt="Concept Haus / National Geography">
                                </div>
                                <div id="slider1_medios" class="carousel-item">
                                     <img class="foodin" src="{{asset('img/clients/foodin.svg')}}" class="client-brand brand5" alt="Concept Haus / National Geography">
                                </div>
                                <div id="slider1_medios" class="carousel-item">
                                     <img class="stack" src="{{asset('img/clients/stack.svg')}}" class="client-brand brand5" alt="Concept Haus / National Geography">
                                </div>
                                <div id="slider1_medios" class="carousel-item">
                                     <img class="zaxic" src="{{asset('img/clients/zaxic.svg')}}" class="client-brand brand5" alt="Concept Haus / National Geography">
                                </div>
                                <div id="slider1_medios" class="carousel-item">
                                     <img class="montesori" src="{{asset('img/clients/montesori.svg')}}" class="client-brand brand5" alt="Concept Haus / National Geography">
                                </div>
                                <div id="slider1_medios" class="carousel-item">
                                     <img class="yiuppi" src="{{asset('img/clients/yiuppi.svg')}}" class="client-brand brand5" alt="Concept Haus / National Geography">
                                </div>
                                
                               
                            </div>
                            <a class="carousel-control-prev" href="#carouselmedios" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon_medios" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselmedios" role="button" data-slide="next">
                                <span class="carousel-control-next-icon_medios" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>

            </div>
    </section>
</div>

@endsection
