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
    @if (Request::path() === 'branding')
        <title>Diseño de marca / Brand Marketing / Agencia de branding y diseño y rebranding corporativo</title>
    @elseif (Request::path() === 'posicionamiento-seo')
        <title>Posicionamiento web en buscadores / Seo en México / Agencia Seo</title>
    @elseif(Request::path() === 'desarrollo-web')
        <title>Desarrollo de paginas Web / Diseño de sitios web / Apps ecommerce y aplicaciones web</title>
    @elseif(Request::path() === 'googleadwords-publicidadenfacebook')
        <title>Google Adwords / Publicidad en Facebook / Sem / Publicidad en internet</title>
    @else
        <title>Agencia de Publicidad / Desarrollo Web / SEO y Marketing Digital en CDMX / Polanco</title>
    @endif

    <meta name="description" content="Agencia de publicidad digital / empresa de marketing."/>

    <!-- Facebook -->
    <meta property="og:locale" content="en_US">
    <meta property="og:title" content="ConceptHaus / Agencia de Publicidad / Desarrollo Web / SEO y Marketing Digital en CDMX"/>
    <meta property="og:image" content="{{asset('img/image-meta.png')}}"/>
    <meta property="og:description" content="Somos un clúster especializado en la creación, desarrollo y fortalecimiento de marcas."/>
    <meta property="og:type" content="website" />
    <meta property="og:url" content="https://concepthaus.mx/" />
    <meta property="og:site_name" content="Concept Haus" />
    <!-- Twitter -->
    <meta name="twitter:card" content="summary" />
    <meta name="twitter:description" content="Somos un clúster especializado en la creación, desarrollo y fortalecimiento de marcas."/>
    <meta name="twitter:title" content="ConceptHaus / Agencia de Publicidad / Desarrollo Web / SEO y Marketing Digital en CDMX"/>
    <meta name="twitter:domain" content="Concept Haus" />

    <meta name="google-site-verification" content="Jjq4yB7AU7iMqXWs12A8VPnopI3ubrcNKQ-6oLRAZ0s" />

    <link rel="canonical" href="https://concepthaus.mx/">
    <!-- Styles -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.4/sweetalert2.min.css">
    <link rel="stylesheet" href="/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/panorama_viewer.min.css">
    {{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" /> --}}

    <link href="{{asset('css/isteven-multi-select.css')}}" rel="stylesheet" />

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
                    <a href="tel:+529982402112">
                        <img class="" src="{{asset('img/elementos/phone-red.svg')}}" alt="ConceptHaus" width="14">
                    </a>
                </div>
            </div>
        </header>

        <!-- Content -->
        @yield('content')
        <!-- ./ Content -->

        <!-- Footer -->
        <div class="llamada">
            <p><a href="tel:+529982402112"><i class="fa fa-phone"></i> Contáctanos</a></p>
        </div>
        <footer>
            {{--  <section id="contact" ng-controller="RegistroController as contacto">
                <h2 class="title-general c-gray">Contáctanos</h2>
                <p class="subtitle-general">¿Tienes un proyecto en mente?</p>
                <div class="contact-info">
                </div>
            </section>  --}}

            <section id="footer">
                <div class="row text-center">
                    <div class="col-sm-12 first">
                        <p class="privacity">
                            <a href="/aviso" target="_blank">Aviso de privacidad</a>
                        </p>
                        <p class="title-footer">CDMX</p>
                        <p>MIGUEL HIDALGO, CDMX</p>
                        <img src="{{asset('img/googlepartner.svg')}}" class="partner" alt="Google Partners" width="160">
                        <p class="ch-company">a <img src="{{asset('img/logo/concept_logo.svg')}}" alt=""> company.</p> 
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
    </div>

    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js"></script>
    {{--
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js"></script> --}}
    <script type="text/javascript" src="/js/bootstrap.min.js"></script>

    <!-- Angular -->
    <script src="https://code.angularjs.org/1.4.0/angular.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/angular-resource/1.3.15/angular-resource.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/danialfarid-angular-file-upload/12.2.13/ng-file-upload.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.0/angular-messages.js"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.0/angular-cookies.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.4/sweetalert2.min.js"></script>
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
    <script type="text/javascript" src="/js/changeColorMenu.js"></script>
    <script type="text/javascript" src="/js/panorama_viewer/jquery.panorama_viewer.js"></script>
    <script type="text/javascript" src="/js/panorama_viewer/panorama_viewer.js"></script>

    <script src="{{asset('js/isteven-multi-select.js')}}"></script>

    <!-- Scripts Particles.js -->
    <!--
        <script src="{{asset('js/particles.js')}}"></script>
        <script src="{{asset('js/app-particle.js')}}"></script>
    -->

    <script src="{{asset('js/scrollreveal.js')}}"></script>

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
    {{-- Lodash --}}
    <script src="https://cdn.jsdelivr.net/npm/lodash@4.17.11/lodash.min.js"></script>
    <script src="//scripts.iconnode.com/67912.js"></script>
</body>

</html>
