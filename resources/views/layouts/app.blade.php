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
    <title>ConceptHaus / Agencia de Publicidad / Desarrollo Web / SEO y Marketing Digital en CDMX</title>
    <meta name="description" content="Somos un cluster especializado en la creación, desarrollo y fortalecimiento de marcas."
    />
    <!-- Facebook -->
    <meta property="og:locale" content="en_US">
    <meta property="og:title" content="ConceptHaus / Agencia de Publicidad / Desarrollo Web / SEO y Marketing Digital en CDMX"
    />
    <meta property="og:image" content="{{asset('img/image-meta.png')}}" />
    <meta property="og:description" content="Somos un cluster especializado en la creación, desarrollo y fortalecimiento de marcas."
    />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="https://concepthaus.mx/" />
    <meta property="og:site_name" content="Concept Haus" />
    <!-- Twitter -->
    <meta name="twitter:card" content="summary" />
    <meta name="twitter:description" content="Somos un cluster especializado en la creación, desarrollo y fortalecimiento de marcas."
    />
    <meta name="twitter:title" content="ConceptHaus / Agencia de Publicidad / Desarrollo Web / SEO y Marketing Digital en CDMX"
    />
    <meta name="twitter:domain" content="Concept Haus" />

    <link rel="canonical" href="https://concepthaus.mx/">
    <!-- Styles -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.4/sweetalert2.min.css">
    <link rel="stylesheet" href="/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/panorama_viewer.min.css"> {{--
    <link rel="stylesheet" href="/css/bootstrap-select.min.css"> --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />

    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-TLGCBXH');</script>
    <!-- End Google Tag Manager -->
</head>

<body ng-app="app">
    <!-- Botones de contacto flotantes -->
    <script>
        window.fbAsyncInit = function () {
            FB.init({
                appId: 'your-app-id',
                autoLogAppEvents: true,
                xfbml: true,
                version: 'v2.12'
            });
        };
        (function (d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) {
                return;
            }
            js = d.createElement(s);
            js.id = id;
            js.src = "https://connect.facebook.net/es_LA/sdk.js";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    </script>
    <div class="fb-customerchat" page_id="120208024724588" theme_color="#e73c30" logged_in_greeting="¡Hola!, ¿cómo podemos ayudarte?"
        logged_out_greeting="¡Hola!, ¿cómo podemos ayudarte?">
    </div>
    <div class="btnFloat-phone">
        <a href="tel:+015552820707">
            <i class="fa fa-phone" aria-hidden="true"></i>
        </a>
    </div>
    <div class="btnFloat-email">
        <a href="{{ url('/#contact') }}">
            <i class="fa fa-envelope" aria-hidden="true"></i>
        </a>
    </div>
    <!-- ../ Botones de contacto flotantes -->
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
                <a href="https://www.facebook.com/ConceptHausBranding/" target="_blank">
                    <i class="fa fa-facebook"></i> /</a>
                <a href="https://www.instagram.com/concepthausmx/" target="_blank">
                    <i class="fa fa-instagram"></i> /</a>
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
                        <a href="tel:+015552820707">01 (55) 52820707</a>
                        <p class="p-address">contacto@concepthaus.mx</p>
                        <p class="p-address">Presa Rodríguez 57, Col. Irrigación, Miguel Hidalgo, CDMX</p>
                    </div>
                    <div class="col-sm">
                        <h5>Puebla</h5>
                        <a href="tel:+012222954243">01 (222) 2954243</a>
                        <p class="p-address">contactopuebla@concepthaus.mx</p>
                        <p class="p-address">Sonata Towers, Work Center L. 21, Lomas de Angelópolis</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-6">
                        <form id="contactoForm" name="contactoForm">
                            {{ csrf_field() }}
                            <input type="text" class="form-control" id="fuente" name="fuente" ng-model="contacto.fuente" ng-init="contacto.fuente='Google'"
                                hidden required>
                            <input type="text" class="form-control" id="tipo" name="tipo" ng-model="contacto.tipo" ng-init="contacto.tipo='Home'" hidden
                                required>
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" id="nombre" name="nombre" ng-model="contacto.nombre" placeholder="Nombre" required>
                                    <span class="msg-error" ng-messages="contactoForm.nombre.$error" ng-if="contactoForm.nombre.$touched">
                                        <div ng-messages-include="/messages_error.html"></div>
                                    </span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12 col-md-6">
                                    <input type="email" class="form-control input-ajust" id="correo" name="correo" ng-model="contacto.correo" placeholder="Correo"
                                        required>
                                    <span class="msg-error" ng-messages="contactoForm.correo.$error" ng-if="contactoForm.correo.$touched">
                                        <div ng-messages-include="/messages_error.html"></div>
                                    </span>
                                </div>
                                <div class="col-sm-12 col-md-6">
                                    <input type="text" class="form-control" id="telefono" name="telefono" mask="9999999999" ng-model="contacto.telefono" ng-minlength="8"
                                        placeholder="Teléfono" required>
                                    <span class="msg-error" ng-messages="contactoForm.telefono.$error" ng-if="contactoForm.telefono.$touched">
                                        <div ng-messages-include="/messages_error.html"></div>
                                    </span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <select class="js-theme-multiple" multiple="multiple" ng-model="contacto.servicios">
                                        <option value="Branding">Branding</option>
                                        <option value="Diseño">Diseño</option>
                                        <option value="Web">Web</option>
                                        <option value="Marketing Digital">Marketing Digital</option>
                                        <option value="Marketing ATL">Marketing ATL</option>
                                        <option value="Marketing BTL">Marketing BTL</option>
                                        <option value="Evento">Evento</option>
                                        <option value="Relaciones Públicas">Relaciones Públicas</option>
                                        <option value="Interiorismo">Interiorismo</option>
                                        <option value="Producción Audiovisual">Producción Audiovisual</option>
                                        <option value="Fotografía">Fotografía</option>
                                        <option value="Otra">Otra</option>
                                    </select>
                                    <span class="msg-error" ng-messages="contactoForm.servicios.$error" ng-if="contactoForm.servicios.$touched">
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
                                    <button class="btn" id="FormHome" ng-click="saveDataContact(contacto, contactoForm)" ng-disabled="!(contacto.nombre) || !(contacto.correo) || !(contacto.telefono) || !(contacto.servicios) || !(contacto.empresa) || !(contacto.mensaje)">Enviar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-sm"></div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 container-iconH text-right">
                    <img src="{{asset('img/conceptH.svg')}}" class="" alt="ConceptHaus" width="100">
                </div>
                <div class="col-sm-12">
                    {{--
                    <iframe src="https://snazzymaps.com/embed/26027" width="100%" height="400px" style="border:none;"></iframe> --}}
                    <iframe src="https://snazzymaps.com/embed/53068" width="100%" height="400px" style="border:none;" /></iframe>
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
                    <p>PRESA RODRÍGUEZ 57, COL. IRRIGACIÓN, MIGUEL HIDALGO, CDMX</p>
                    <p class="title-footer">Puebla</p>
                    <p>SONATA TOWERS, WORK CENTER L. 21, LOMAS DE ANGELÓPOLIS</p>
                    <img src="{{asset('img/googlepartner.svg')}}" class="partner" alt="Google Partners" width="160">
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/i18n/defaults-*.min.js"></script> --}} {{--
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js"></script> --}}
    <script type="text/javascript" src="/js/bootstrap.min.js"></script>
    {{--
    <script src="/js/bootstrap-select.js"></script> --}}

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
    <script type="text/javascript" src="/js/scrollPosStyler.js"></script>
    <script type="text/javascript" src="/js/changeColorMenu.js"></script>
    <script type="text/javascript" src="/js/panorama_viewer/jquery.panorama_viewer.js"></script>
    <script type="text/javascript" src="/js/panorama_viewer/panorama_viewer.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <script>
        $(".js-theme-multiple").select2({
            theme: "classic",
            placeholder: "Selecciona los servicios de interés",
            allowClear: true
        });
    </script>

    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TLGCBXH"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->

</body>

</html>