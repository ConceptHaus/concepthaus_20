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
    <link rel="shortcut icon" href="/img/faviconanimation.gif" type="image/gif">
    <title>Agencia de publicidad, Branding y Marketing digital / Polanco</title>
    <meta name="description" content="Agencia de publicidad, Branding y Marketing digital / Polanco"/>
    <!-- Facebook -->
    <meta property="og:locale" content="en_US">
    <meta property="og:title" content="Agencia de publicidad, Branding y Marketing digital / Polanco"/>
    <meta property="og:image" content="{{asset('img/image-meta.png')}}" />
    <meta property="og:description" content="Somos expertos en la creación, desarrollo y fortalecimiento de marca. Más de 200 marcas creadas a nivel global. / Polanco"/>
    <meta property="og:type" content="website" />
    <meta property="og:url" content="https://concepthaus.mx/" />
    <meta property="og:site_name" content="Concept Haus" />
    <!-- Twitter -->
    <meta name="twitter:card" content="summary" />
    <meta name="twitter:description" content="Somos expertos en la creación, desarrollo y fortalecimiento de marca. Más de 200 marcas creadas a nivel global."/>
    <meta name="twitter:title" content="Agencia de publicidad, Branding y Marketing digital / Polanco"/>
    <meta name="twitter:domain" content="Concept Haus" />
    <!-- SEO -->
    <meta name="google-site-verification" content="Jjq4yB7AU7iMqXWs12A8VPnopI3ubrcNKQ-6oLRAZ0s" />

    <link rel="canonical" href="https://concepthaus.mx/">
    <!-- Styles -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.4/sweetalert2.min.css">
    <link rel="stylesheet" href="/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="/css/style.css">
    {{-- <link rel="stylesheet" href="/css/panorama_viewer.min.css">  --}}

    <link href="{{asset('css/isteven-multi-select.css')}}" rel="stylesheet" />
    {{--
    <link rel="stylesheet" href="/css/bootstrap-select.min.css"> --}}
    {{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" /> --}}

    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-TLGCBXH');</script>
    <!-- End Google Tag Manager -->
</head>

<body ng-app="app">

    <!-- Particles | Loader -->
    <!-- <div id="particles-js">
        <div class="content-gif">
            <div class="content-img">
                <img src="{{asset('img/loader.gif')}}" src="img/loader.gif">
            </div>
        </div>
    </div> -->

    <!-- View Home -->
    <!-- id="page" -->
    <div>
        <!-- Botones de contacto flotantes 
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
        <div class="fb-customerchat" page_id="120208024724588" theme_color="#e73c30" logged_in_greeting="¡Hola! ¿cómo podemos ayudarte?"
            logged_out_greeting="¡Hola! ¿cómo podemos ayudarte?">
        </div> -->
        <!-- ../ Botones de contacto flotantes -->

        <!-- Header -->
        <!-- Main navigation -->
        <header class="nav-down">
            <div class="row align-items-center">
                <div class="col-sm-12 col-md-1 col-lg-1 content-logo">
                    <a href="{{ url('/') }}">
                        <img class="logo" src="{{asset('img/logo/concept.svg')}}" alt="Concept Haus">
                    </a>
                </div>

                <div class="col-sm-12 col-md-9 col-lg-9 navbarTop text-center pd-none">

                    <div class="container hidden-sm-down pd-none">
                        <div class="row mr-none">
                            <div class="col align-self-center text-center pd-none">
                                {{-- <a href="{{ url('/crew') }}">CREW</a> --}}
                                <a href="{{ url('/conceptHaus') }}">BRANDING & MKT</a>
                                <a href="{{ url('/inhaus') }}">AUDIOVISUAL</a>
                                <a href="{{ url('/treehaus') }}">SUSTENTABILIDAD</a>
                                <a href="{{ url('/startups') }}">STARTUPS</a>
                                <a href="{{ url('/#contact') }}">CONTACTO</a>
                                <a href="https://concepthaus.mx/blog">BLOG</a>
                                <a href="{{ url('/jobs') }}">JOBS</a>
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
                                <a class="nav-item nav-link" href="{{ url('/conceptHaus') }}">BRANDING & MKT</a>
                                <a class="nav-item nav-link" href="{{ url('/inhaus') }}">AUDIOVISUAL</a>
                                <a class="nav-item nav-link" href="{{ url('/treehaus') }}">SUSTENTABILIDAD</a>
                                <a class="nav-item nav-link" href="{{ url('/startups') }}">STARTUPS</a>
                                <a class="nav-item nav-link" href="{{ url('/#contact') }}">CONTACTO</a>
                                <a class="nav-item nav-link" href="https://concepthaus.mx/blog">BLOG</a>
                                <a class="nav-item nav-link" href="{{ url('/jobs') }}">JOBS</a>
                            </div>
                        </div>
                    </nav>

                </div>
                <div class="col-sm-12 col-md-2 col-lg-2 socialIcons text-right">
                    <a href="https://www.facebook.com/ConceptHausBranding/" target="_blank">
                        <i class="fa fa-facebook"></i> /</a>
                    <a href="https://www.instagram.com/concepthausmx/" target="_blank">
                        <i class="fa fa-instagram"></i> /</a>
                    <a href="https://www.behance.net/concepthausmx" target="_blank">
                        <i class="fa fa-behance"></i> /</a>
                    <a href="{{ url('/#contact') }}">
                        <img class="" src="{{asset('img/elementos/mail-red.svg')}}" alt="ConceptHaus" width="16"> /
                    </a>
                    <a href="tel:+525546240265">
                        <img class="" src="{{asset('img/elementos/phone-red.svg')}}" alt="ConceptHaus" width="14">
                    </a>
                </div>
            </div>
        </header>

        {{-- <header>
            <div class="row align-items-center">
                <div class="col-sm-12 col-md-5 col-lg-4 text-center">
                    <a href="{{ url('/') }}">
                        <img class="logo" src="{{asset('img/logo/concept.svg')}}" alt="Concept Haus">
                    </a>
                </div>

                <div class="col-sm-12 col-md-2 col-lg-4 text-center">
                    <a href="{{ url('/') }}">
                        <img class="logo" src="{{asset('img/logo/concept.svg')}}" alt="Concept Haus">
                    </a>
                </div>
                <div class="col-sm-12 col-md-5 col-lg-4 socialIcons text-right">
                    <a href="https://www.facebook.com/ConceptHausBranding/" target="_blank">
                        <i class="fa fa-facebook"></i> /</a>
                    <a href="https://www.instagram.com/concepthausmx/" target="_blank">
                        <i class="fa fa-instagram"></i> /</a>
                    <a href="https://www.behance.net/concepthausmx" target="_blank">
                        <i class="fa fa-behance"></i> /</a>
                    <a href="{{ url('/#contact') }}">
                        <img class="" src="{{asset('img/elementos/mail-red.svg')}}" alt="ConceptHaus" width="18"> /
                    </a>

                    <a href="tel:+5552820707">
                        <img class="" src="{{asset('img/elementos/phone-red.svg')}}" alt="ConceptHaus" width="16">
                    </a>
                </div>
            </div>
        </header> --}}

        {{-- <section id="subMenu" class="sps sps--abv">
            <div class="container hidden-sm-down">
                <div class="row">
                    <div class="col align-self-center text-center">
                        <a href="{{ url('/crew') }}">CREW</a>
                        <a href="{{ url('/conceptHaus') }}">BRANDING & MKT</a>
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
                        <a class="nav-item nav-link" href="{{ url('/conceptHaus') }}">BRANDING & MKT</a>
                        <a class="nav-item nav-link" href="{{ url('/inhaus') }}">AUDIOVISUAL</a>
                        <a class="nav-item nav-link disabled" href="{{ url('/treehaus') }}">SUSTENTABILIDAD</a>
                        <a class="nav-item nav-link" href="{{ url('/startups') }}">STARTUPS</a>
                        <a class="nav-item nav-link disabled" href="{{ url('/#contact') }}">CONTACTO</a>
                    </div>
                </div>
            </nav>
        </section> --}}
        <!-- ./ Header -->

        <!-- Content -->

        @yield('content')
        <a href="https://api.whatsapp.com/send?phone=525570092934" class="btn-flotante" target="_blank"><img src="{{asset('img/Floating_Whatsap.png')}}"></a>
        <!-- ./ Content -->

        <!-- Footer -->
        <div class="llamada">
            <p><a href="tel:+525546240265"><i class="fa fa-phone"></i> Contáctanos</a></p>
        </div>
        <footer>
          @if (Request::path() != 'brief-branding')
            <section id="contact" ng-controller="RegistroController as contacto">
                <h2 class="title-general">
                    <img class="img-icon-title" src="{{asset('img/conceptRight.svg')}}" alt="ConceptHaus"> Contáctanos
                </h2>
                <p class="subtitle-general">¿Tienes un proyecto en mente?</p>
                <div class="contact-info">
                    <div class="row">
                        <div class="col-sm">
                            <h5>CDMX</h5>
                            <a href="tel:+525546240265">(55) 52820707</a>
                            <p class="p-address">ventas@concepthaus.mx</p>
                            <p class="p-address">Campos Elíseos</p>
                            <p class="p-address">Miguel Hidalgo, CDMX</p>
                        </div>
                        <!--<div class="col-sm">
                            <h5>Puebla</h5>
                            <a href="tel:+2222954243">(222) 2954243</a>
                            <p class="p-address">contactopuebla@concepthaus.mx</p>
                            <p class="p-address">Las Ánimas, Puebla</p>
                        </div>-->
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-6 content-form-contact">
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
                                        <div isteven-multi-select
                                            input-model="listServicies"
                                            output-model="contacto.outputServicies"
                                            button-label="icon name"
                                            item-label="icon name maker"
                                            tick-property="ticked"
                                            class="formNewSelectHome">
                                        </div>
                                        <span class="msg-error" ng-messages="contactoForm.outputServicies.$error" ng-if="contactoForm.outputServicies.$touched">
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
                                        <button class="btn" id="FormHome" ng-click="saveDataContact(contacto, contactoForm)" ng-disabled="!(contacto.nombre) || !(contacto.correo) || !(contacto.telefono) || !(contacto.outputServicies) || !(contacto.empresa) || !(contacto.mensaje)">Enviar</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-sm"></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 container-iconH text-right">
                        <img src="{{asset('img/conceptH.svg')}}" class="" alt="ConceptHaus" width="65">
                    </div>
                    <div class="col-sm-12">
                        {{--
                        <iframe src="https://snazzymaps.com/embed/26027" width="100%" height="400px" style="border:none;"></iframe> --}}
                        <iframe src="https://snazzymaps.com/embed/53068" width="100%" height="400px" style="border:none;" /></iframe>
                    </div>
                </div>
            </section>
          @endif
            <section id="footer">
                <div class="row text-center">
                    <div class="col-sm-12 first">
                        <p class="privacity">
                            <a href="/aviso" target="_blank">Aviso de privacidad</a>
                        </p>
                        <p class="title-footer">CDMX</p>
                        <p>MIGUEL HIDALGO, CDMX</p>
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

    </div>

    <!-- ./ Footer -->
    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js"></script> --}}
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
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.0/angular-route.js"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.0/angular-cookies.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.4/sweetalert2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/danialfarid-angular-file-upload/12.2.13/ng-file-upload.min.js"></script>

    <script src="/js/ngMask.min.js"></script>
    <script src="/angular-app/angular-app.js"></script>
    <script src="/angular-app/services/RegistroService.js"></script>
    <script src="/angular-app/controllers/RegistroController.js"></script>
    <script src="/angular-app/controllers/WelcomeController.js"></script>
    <script src="/angular-app/controllers/ProyectosController.js"></script>
    <script src="/angular-app/controllers/CrewController.js"></script>
    <script src="/angular-app/controllers/VacantesController.js"></script>
    <script src="/angular-app/services/VacantesService.js"></script>

    <!-- ./ Angular -->

    <!-- -->
    <script type="text/javascript" src="/js/scrollPosStyler.js"></script>
    {{-- <script src="https://unpkg.com/scrollreveal/dist/scrollreveal.min.js"></script> --}}
    <script src="https://unpkg.com/scrollreveal/dist/scrollreveal.min.js"></script>

    {{-- Ya no  --}}
    {{-- <script type="text/javascript" src="/js/changeColorMenu.js"></script> --}}
    <script type="text/javascript" src="/js/panorama_viewer/jquery.panorama_viewer.js"></script>
    <script type="text/javascript" src="/js/panorama_viewer/panorama_viewer.js"></script>

    <script src="{{asset('js/isteven-multi-select.js')}}"></script>

    <!-- Scripts Particles.js -->
    {{--
        <script src="{{asset('js/particles.js')}}"></script>
        <script src="{{asset('js/app-particle.js')}}"></script>
    --}}

    <script src="{{asset('js/scrollreveal.js')}}"></script>

    {{-- Lodash --}}
    <script src="https://cdn.jsdelivr.net/npm/lodash@4.17.11/lodash.min.js"></script>

    {{-- <script src="{{asset('plugins/tilt/tilt.jquery.min.js')}}"></script> --}}

    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script> --}}
    {{-- <script>
        $(".js-theme-multiple").select2({
            theme: "classic",
            placeholder: "Selecciona los servicios de interés",
            allowClear: true
        });
    </script> --}}

    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TLGCBXH"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->

    <!-- Script loading page -->
    {{-- <script type="text/javascript">
        $(window).load(function() {
            $("#particles-js").fadeOut( 400, function() {
                $(".content-gif").addClass("loaded");
                $(".content-img").addClass("loaded-img");
                $("#page").addClass("visible");
            });
        });
    </script> --}}


    <script>
        // Hide Header on on scroll down
        var didScroll;
        var lastScrollTop = 0;
        var delta = 5;
        var navbarHeight = $('header').outerHeight();

        $(window).scroll(function(event){
            didScroll = true;
        });

        setInterval(function() {
            if (didScroll) {
                hasScrolled();
                didScroll = false;
            }
        }, 250);

        function hasScrolled() {
            var st = $(this).scrollTop();

            // Make sure they scroll more than delta
            if(Math.abs(lastScrollTop - st) <= delta)
                return;

            // If they scrolled down and are past the navbar, add class .nav-up.
            // This is necessary so you never see what is "behind" the navbar.
            if (st > lastScrollTop && st > navbarHeight){
                // Scroll Down
                $('header').removeClass('nav-down').addClass('nav-up');
            } else {
                // Scroll Up
                if(st + $(window).height() < $(document).height()) {
                    $('header').removeClass('nav-up').addClass('nav-down');
                }
            }

            lastScrollTop = st;
        }
    </script>
    <script src="//scripts.iconnode.com/67912.js"></script>
    <script>
        new WOW().init();
    </script>
</body>

</html>