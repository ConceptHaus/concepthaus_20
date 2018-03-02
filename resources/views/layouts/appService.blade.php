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
    <meta name="description" content="Somos un cluster especializado en la creación, desarrollo y fortalecimiento de marcas."/>
    <!-- Facebook -->
    <meta property="og:locale" content="en_US">
    <meta property="og:title" content="ConceptHaus / Agencia de Publicidad / Desarrollo Web / SEO y Marketing Digital en CDMX"/>
    <meta property="og:image" content="{{asset('img/image-meta.png')}}"/>
    <meta property="og:description" content="Somos un cluster especializado en la creación, desarrollo y fortalecimiento de marcas."/>
    <meta property="og:type" content="website" />
    <meta property="og:url" content="http://concepthaus.mx/" />
    <meta property="og:site_name" content="Concept Haus" />
    <!-- Twitter --> 
    <meta name="twitter:card" content="summary" />
    <meta name="twitter:description" content="Somos un cluster especializado en la creación, desarrollo y fortalecimiento de marcas."/>
    <meta name="twitter:title" content="ConceptHaus / Agencia de Publicidad / Desarrollo Web / SEO y Marketing Digital en CDMX"/>
    <meta name="twitter:domain" content="Concept Haus" />

    <link rel="canonical" href="http://concepthaus.mx/">
    <!-- Styles -->
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
    <!-- ./ Header -->

    <!-- Content -->
    @yield('content')
    <!-- ./ Content -->

    <!-- Footer -->
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