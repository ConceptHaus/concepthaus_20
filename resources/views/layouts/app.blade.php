<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <!-- Meta Tags -->
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" / <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Mobile Specifics -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Mobile Internet Explorer ClearType Technology -->
    <!--[if IEMobile]>  <meta http-equiv="cleartype" content="on"><![endif]-->
    <link rel="icon" href="/img/favicon.png" sizes="32x32" type="image/png">
    <title>{{ config('app.name', 'Concept Haus') }} / Agencia de Publicidad / Desarrollo Web / SEO y Marketing Digital en CDMX</title>
    <meta name="description" content="Somos una agencia especializada en la creación, desarrollo y fortalecimiento de marca."
    />
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="ConceptHaus / Agencia de Publicidad / Desarrollo Web / SEO y Marketing Digital en CDMX"
    />
    <meta property="og:description" content="Somos una agencia especializada en la creación, desarrollo y fortalecimiento de marca."
    />
    <meta property="og:url" content="http://concepthaus.mx/" />
    <meta property="og:site_name" content="Concept Haus" />
    <meta name="twitter:card" content="summary" />
    <meta name="twitter:description" content="Somos una agencia especializada en la creación, desarrollo y fortalecimiento de marca."
    />
    <meta name="twitter:title" content="ConceptHaus / Agencia de Publicidad / Desarrollo Web / SEO y Marketing Digital en CDMX"
    />
    <meta name="twitter:domain" content="Concept Haus" />

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.4/sweetalert2.min.css">
    <link rel="stylesheet" href="/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/panorama_viewer.min.css">
</head>

<body ng-app="app">
    <!-- Header -->
    <!-- Main navigation -->
    <header>
        <div class="row align-items-center">
            <div class="col-sm-12 col-md-5 col-lg-4">
                <p class="short-description">Somos un cluster especializado en la creación,
                    <span>desarrollo y fortalecimiento de marcas.</span>
                </p>
            </div>

            <div class="col-sm-12 col-md-2 col-lg-4 text-center">
                <a href="{{ url('/') }}">
                    <img class="logo" src="{{asset('img/conceptLlogoWhite.svg')}}" alt="Concept Haus">
                </a>
            </div>
            <div class="col-sm-12 col-md-5 col-lg-4 socialIcons text-right">
                <a href="https://www.facebook.com/ConceptHausBranding/" target="_blank">FB /</a>
                <a href="https://www.instagram.com/concepthausmx/" target="_blank"> IG /</a>
                <a href="http://concepthaus.mx/blog/" target="_blank">BLOG</a>
            </div>
        </div>
    </header>
    <section id="subMenu" class="sps sps--abv">
        <div class="container hidden-sm-down">
            <div class="row">
                <div class="col align-self-center text-center">
                    <a href="{{ url('/crew') }}">CREW</a>
                    <a href="{{ url('/conceptHaus') }}">PUBLICIDAD</a>
                    <a href="{{ url('/inhaus') }}">AUDIOVISUAL</a>
                    <a href="{{ url('/treehaus') }}">SUSTENTABILIDAD</a>
                    <a href="{{ url('/startups') }}">STARTUPS</a>
                    <a href="{{ url('/#contact') }}">CONTACTO</a>
                </div>
            </div>
        </div>
        <nav class="navbar navbar-toggleable-md navbar-light bg-faded hidden-sm-up">
            <button class="navButtom navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-item nav-link active" href="{{ url('/crew') }}">CREW</a>
                    <a class="nav-item nav-link" href="{{ url('/conceptHaus') }}">PUBLICIDAD</a>
                    <a class="nav-item nav-link" href="{{ url('/inhaus') }}">AUDIOVISUAL</a>
                    <a class="nav-item nav-link disabled" href="{{ url('/treehaus') }}">SUSTENTABILIDAD</a>
                    <a class="nav-item nav-link" href="{{ url('/startups') }}">STARTUPS</a>
                    <a class="nav-item nav-link disabled" href="{{ url('/#contact') }}">CONTACTO</a>
                </div>
            </div>
        </nav>
    </section>
    <!-- ./ Header -->

    <!-- Content -->
    @yield('content')
    <!-- ./ Content -->

    <!-- Footer -->
    <footer>
        <section id="contact" ng-controller="RegistroController as contacto">
            <h2 class="title-general c-gray">Contáctanos</h2>
            <p class="subtitle-general">¿Tienes un proyecto en mente?</p>
            <div class="contact-info">
                <div class="row">
                    <div class="col-sm">
                        <h5>CDMX</h5>
                        <p>01 (55) 52820707</p>
                        <p>contacto@concepthaus.mx</p>
                        <p>Campos Elíseos Col. Polanco, México D.F.</p>
                    </div>
                    <div class="col-sm">
                        <h5>Puebla</h5>
                        <p>01 (222) 2954243</p>
                        <p>contactopuebla@concepthaus.mx</p>
                        <p>Sonata Towers, Work Center L. 21, Lomas de Angelópolis</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm">
                        <form id="contactoForm" name="contactoForm">
                            {{ csrf_field() }}
                            <input type="text" class="form-control" id="fuente" name="fuente" ng-model="contacto.fuente" ng-init="contacto.fuente='Google'"
                                hidden required>
                            <input type="text" class="form-control" id="tipo" name="tipo" ng-model="contacto.tipo" ng-init="contacto.tipo='Home'"
                                hidden required>
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" id="nombre" name="nombre" ng-model="contacto.nombre" placeholder="Nombre" required>
                                    <span class="msg-error" ng-messages="contactoForm.nombre.$error" ng-if="contactoForm.nombre.$touched">
                                        <div ng-messages-include="/messages_error.html"></div>
                                    </span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6">
                                    <input type="email" class="form-control" id="correo" name="correo" ng-model="contacto.correo" placeholder="Correo" required>
                                    <span class="msg-error" ng-messages="contactoForm.correo.$error" ng-if="contactoForm.correo.$touched">
                                        <div ng-messages-include="/messages_error.html"></div>
                                    </span>
                                </div>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="telefono" name="telefono" mask="9999999999" ng-model="contacto.telefono" ng-minlength="8"
                                        placeholder="Teléfono" required>
                                    <span class="msg-error" ng-messages="contactoForm.telefono.$error" ng-if="contactoForm.telefono.$touched">
                                        <div ng-messages-include="/messages_error.html"></div>
                                    </span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" id="empresa" name="empresa" ng-model="contacto.empresa" placeholder="Empresa" required>
                                    <span class="msg-error" ng-messages="contactoForm.empresa.$error" ng-if="contactoForm.empresa.$touched">
                                        <div ng-messages-include="/messages_error.html"></div>
                                    </span>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <textarea class="form-control" id="mensaje" name="mensaje" ng-model="contacto.mensaje" placeholder="Mensaje" rows="4" required></textarea>
                                    <span class="msg-error" ng-messages="contactoForm.mensaje.$error" ng-if="contactoForm.mensaje.$touched">
                                        <div ng-messages-include="/messages_error.html"></div>
                                    </span>
                                </div>
                            </div>

                            <div class="form-group row text-center">
                                <div class="col-sm-12">
                                    <button class="btn" id="EnviaDatosRegistro" ng-click="saveDataContact(contacto, contactoForm)" ng-disabled="contactoForm.$invalid">Enviar</button>
                                </div>
                            </div>
                        </form>
                        

                        {{--  <form id="FormDatosContacto" name="formContact" role="form" method="post" data-toggle="validator" novalidate="true">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <input ng-model="contacto.name" type="text" class="form-control" name="name" id="name" placeholder="Nombre" data-error="Escribe tu nombre completo."
                                            required>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input type="email" ng-model="contacto.email" class="form-control" name="email" id="email" placeholder="Correo" data-error="Lo sentimos, email no válido."
                                            required>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input type="text" id="phone" name="phone" class="form-control" ng-model="contacto.phone" mask="(99) 9?9999-9999" placeholder="Teléfono"
                                            required>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <input type="text" ng-model="contacto.empresa" class="form-control" name="empresa" id="empresa" placeholder="Empresa" data-error="Escribe tu empresa."
                                            required>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <textarea ng-model="contacto.message" class="form-control" name="message" id="message" placeholder="Mensaje" data-error="¡Dejanos tu mensaje!"
                                            rows="4" required></textarea>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group text-center">
                                <button class="btn btn-default" ng-click="saveDataContact(contacto)" ng-disabled="!formContact.$valid">Enviar</button>
                            </div>  
                        </form> --}}
                    </div>
                    <div class="col-sm"></div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 container-iconH text-right">
                    <img src="{{asset('img/conceptH.svg')}}" class="" alt="ConceptHaus" width="100">
                </div>
                <div class="col-sm-12">
                    <iframe src="https://snazzymaps.com/embed/26027" width="100%" height="400px" style="border:none;"></iframe>
                </div>
            </div>
        </section>

        <section id="footer">
            <div class="row text-center">
                <div class="col-sm-12 first">
                    <p class="privacity">
                        <a href="">Aviso de privacidad</a>
                    </p>
                    <p class="title-footer">CDMX</p>
                    <p>CAMPOS ELÍSEOS COL. POLANCO, MÉXICO D.F.</p>
                    <p class="title-footer">Puebla</p>
                    <p>SONATA TOWERS, WORK CENTER L. 21, LOMAS DE ANGELÓPOLIS</p>
                    <p class="powered">Powered & Copyright by Concepthaus</p>
                </div>
                <div class="col-sm-12 second">
                    <h4 class="accenting">
                        <img src="{{asset('img/accetingLogo.svg')}}" class="" alt="Accenting everything" width="20">
                        <span>Accenting</span> everything
                    </h4>
                </div>
            </div>
        </section>
    </footer>
    <!-- ./ Footer -->
    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js"></script>
    {{--
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js"></script> --}}
    <script type="text/javascript" src="/js/bootstrap.min.js"></script>

    <!-- Angular -->
    <script src="https://code.angularjs.org/1.4.0/angular.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/angular-resource/1.3.15/angular-resource.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.0/angular-messages.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.4/sweetalert2.min.js"></script>
    <script src="/js/ngMask.min.js"></script>
    <script src="/angular-app/angular-app.js"></script>
    <script src="/angular-app/services/RegistroService.js"></script>
    <script src="/angular-app/controllers/RegistroController.js"></script>
    <script src="/angular-app/controllers/WelcomeController.js"></script>
    <script src="/angular-app/controllers/ProyectosController.js"></script>
    <script src="/angular-app/controllers/CrewController.js"></script>

    <!-- ./ Angular -->

    <!-- -->
    <script type="text/javascript" src="/js/changeColorMenu.js"></script>
    <script type="text/javascript" src="/js/panorama_viewer/jquery.panorama_viewer.js"></script>
    <script type="text/javascript" src="/js/panorama_viewer/panorama_viewer.js"></script>

</body>

</html>