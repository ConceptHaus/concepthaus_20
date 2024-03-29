<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png" />
    {{-- <link rel="icon" type="image/png" href="../assets/img/favicon.png" /> --}}
    <link rel="shortcut icon" href="../assets/img/faviconanimation.gif" type="image/gif">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <title>ConceptHaus / Administrador</title>
    <meta name="description" content="Somos un clúster especializado en la creación, desarrollo y fortalecimiento de marcas."/>

    <!-- Facebook -->
    <meta property="og:locale" content="en_US">
    <meta property="og:title" content="ConceptHaus / Agencia de Publicidad / Desarrollo Web / SEO y Marketing Digital en CDMX"/>
    <meta property="og:image" content="{{asset('img/image-meta.png')}}"/>
    <meta property="og:description" content="Somos un clúster especializado en la creación, desarrollo y fortalecimiento de marcas."/>
    <meta property="og:type" content="website" />
    <meta property="og:url" content="http://concepthaus.mx/" />
    <meta property="og:site_name" content="Concept Haus" />
    <!-- Twitter -->
    <meta name="twitter:card" content="summary" />
    <meta name="twitter:description" content="Somos un clúster especializado en la creación, desarrollo y fortalecimiento de marcas."/>
    <meta name="twitter:title" content="ConceptHaus / Agencia de Publicidad / Desarrollo Web / SEO y Marketing Digital en CDMX"/>
    <meta name="twitter:domain" content="Concept Haus" />

    <link rel="canonical" href="http://concepthaus.mx/">

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/png" href="{{ asset('img/favicon.png') }}"/>
    <!-- Bootstrap core CSS -->
    <link href="{{asset('admin/css/bootstrap.min.css')}}" rel="stylesheet"/>
    <!--  Material Dashboard CSS    -->
    <link href="{{asset('admin/css/material-dashboard.css?v=1.2.0')}}" rel="stylesheet"/>
    <link href="{{asset('css/admin.css')}}" rel="stylesheet"/>

    <!-- Table responsive -->
    <link href="{{asset('admin/css/tablesaw.css')}}" rel="stylesheet" />
    <!--  Table Responsive -->
    <script src="{{asset('admin/js/tablesaw.js')}}"></script>
    <script src="{{asset('admin/js/tablesaw-init.js')}}"></script>

    <!-- Fonts and icons -->
    <link href="https://use.fontawesome.com/releases/v5.0.7/css/all.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,700,300|Material+Icons' rel='stylesheet' type='text/css'>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.4/sweetalert2.min.css" rel="stylesheet" >
    {{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet"/> --}}

    <link href="{{asset('css/isteven-multi-select.css')}}" rel="stylesheet" />

    <script src="//cdn.jsdelivr.net/webshim/1.14.5/polyfiller.js"></script>
    <script>
        webshims.setOptions('forms-ext', {types: 'date'});
        webshims.polyfill('forms forms-ext');
    </script>
</head>

<body ng-app="app">
    <div class="wrapper">
        <div class="sidebar" data-color="red" data-image="{{asset('admin/img/sidebar.png')}}">
        <!--
            Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"
            Tip 2: you can also add an image using data-image tag
        -->
            <div class="logo" style="padding-top: 20px;">
                <a href="{{ url('/home') }}" class="simple-text">
                    <img src="{{asset('img/logo/concepthaus.svg')}}" alt="Concept Haus" width="180">
                </a>
            </div>

            <div class="sidebar-wrapper">
                <ul class="nav">
                    @if (Request::path() === 'home') <li class="active"> @else <li> @endif
                        <a href="{{ url('/home') }}">
                            <i class="material-icons">dashboard</i>
                            <p>Dashboard</p>
                        </a>
                    </li>

                    @if (Request::path() === 'ownLeads') <li class="active"> @else <li> @endif
                        <a href="{{ url('/ownLeads') }}">
                            <i class="material-icons">list</i>
                            <p>Mis leads</p>
                        </a>
                    </li>

                    @if (Request::path() === 'registroLead')<li class="active">@else<li>@endif
                            <a href="{{ url('/registroLead') }}">
                                <i class="material-icons">person_add</i>
                                <p>Registrar lead</p>
                            </a>
                        </li>

                    <li class="text-center" style=" color: #87898d;
                    padding: 5% 0;
                    font-weight: 700;
                    text-transform: uppercase;
                    border-bottom: 1px solid rgba(180, 180, 180, 0.3);
                    margin: 0 20px;">Leads</li>

                    @if (Request::path() === 'registros')<li class="active">@else<li>@endif
                        <a href="{{ url('/registros') }}">
                            <i class="material-icons">contact_mail</i>
                            <p>Todos</p>
                        </a>
                    </li>

                    @if (Request::path() === 'registros/recibidos')<li class="active">@else<li>@endif
                        <a href="{{ url('/registros/recibidos') }}">
                            <p>
                                @if (Request::path() === 'registros/recibidos')
                                    <i class="material-icons txt-gray">playlist_add_check</i>
                                @else
                                    <i class="material-icons txt-gray">playlist_add_check</i>
                                @endif
                                Recibidos
                            </p>
                        </a>
                    </li>

                    @if (Request::path() === 'registros/proceso')<li class="active">@else<li>@endif
                        <a href="{{ url('/registros/proceso') }}">
                            <p>
                                @if (Request::path() === 'registros/proceso')
                                    <i class="material-icons txt-gray">access_time</i>
                                @else
                                    <i class="material-icons txt-gray">access_time</i>
                                @endif
                                En proceso
                            </p>
                        </a>
                    </li>

                    @if (Request::path() === 'registros/cotizados')<li class="active">@else<li>@endif
                        <a href="{{ url('/registros/cotizados') }}">
                            <p>
                                @if (Request::path() === 'registros/cotizados')
                                    <i class="material-icons txt-orange">insert_drive_file</i>
                                @else
                                    <i class="material-icons txt-orange">insert_drive_file</i>
                                @endif
                                Cotizados
                            </p>
                        </a>
                    </li>

                    @if (Request::path() === 'registros/cerrados')<li class="active">@else<li>@endif
                        <a href="{{ url('/registros/cerrados') }}">
                            <p>
                                @if (Request::path() === 'registros/cerrados')
                                    <i class="material-icons txt-blue">check</i>
                                @else
                                    <i class="material-icons txt-blue">check</i>
                                @endif
                                Cerrados
                            </p>
                        </a>
                    </li>

                    @if (Request::path() === 'registros/no-viables')<li class="active">@else<li>@endif
                        <a href="{{ url('/registros/no-viables') }}">
                            <p>
                                @if (Request::path() === 'registros/no-viables')
                                    <i class="material-icons txt-red">close</i>
                                @else
                                    <i class="material-icons txt-red">close</i>
                                @endif
                                No viables
                            </p>
                        </a>
                    </li>

                    @if (Request::path() === 'createJob' || Request::path() === 'vacantes')<li class="active">@else<li>@endif
                        <a href="{{ url('/vacantes') }}">
                            <p>
                                @if (Request::path() === 'createJob' || Request::path() === 'vacantes')
                                    <i class="material-icons txt-red">work</i>
                                @else
                                    <i class="material-icons txt-red">work</i>
                                @endif
                                Vacantes
                            </p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="main-panel">
            <nav class="navbar navbar-transparent navbar-absolute">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="#"> Administrador / Concept Haus</a>
                    </div>
                    <div class="collapse navbar-collapse">
                        <ul class="nav navbar-nav navbar-right">
                            <li>
                                <a href="{{ url('/home') }}">
                                    <i class="material-icons">dashboard</i>
                                </a>
                            </li>
                            <!-- Authentication Links -->
                            @if (Auth::guest())
                                <li><a href="{{ route('login') }}">Login</a></li>
                                <li><a href="{{ route('register') }}">Register</a></li>
                            @else
                                <li class="dropdown dropdown-user">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                        <i class="material-icons">person</i>
                                        {{ Auth::user()->name }} <span class="caret"></span>
                                    </a>

                                    <ul class="dropdown-menu dropdown-blue" role="menu">
                                        <li>
                                            <a href="{{ url('/perfil') }}">
                                                Perfil Usuario
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                                Cerrar Sesión
                                            </a>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                {{ csrf_field() }}
                                            </form>
                                        </li>
                                    </ul>
                                </li>
                            @endif
                        </ul>
                    </div>
                </div>
            </nav>
            <div class="content">

                @yield('content')

            </div>
            <footer class="footer">
                <div class="container-fluid">
                    <nav class="pull-left">
                        <ul>
                            <li>
                                <a href="{{url('/')}}" target="_blank">
                                    Home Concept Haus
                                </a>
                            </li>
                        </ul>
                    </nav>
                    <p class="copyright pull-right">
                        Derechos reservados 2018
                    </p>
                </div>
            </footer>
        </div>
    </div>
</body>
{{-- Core JS Files   --}}
<script src="{{asset('admin/js/jquery-3.2.1.min.js')}}" type="text/javascript"></script>
<script src="{{asset('admin/js/bootstrap.min.js')}}" type="text/javascript"></script>
<script src="{{asset('admin/js/material.min.js')}}" type="text/javascript"></script>
{{-- Pagination --}}
<script src="https://code.angularjs.org/1.4.0/angular.js"></script>
<script src="{{asset('angular-app/angular-app.js')}}"></script>
{{-- <script src="{{asset('admin/js/dirPagination.js')}}" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/angular-sanitize/1.4.0/angular-sanitize.js"></script> --}}
{{-- Pagination --}}
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.0/angular-cookies.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/angular-resource/1.3.15/angular-resource.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.0/angular-messages.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/danialfarid-angular-file-upload/12.2.13/ng-file-upload.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.4/sweetalert2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/lodash.js/4.17.4/lodash.js"></script>
{{--  <script src="https://unpkg.com/ng-table@2.0.2/bundles/ng-table.min.js"></script>  --}}

<script src="https://cdn.jsdelivr.net/npm/angular-utils-pagination@0.11.1/dirPagination.js"></script>
<script src="{{asset('angular-app/services/RegistroService.js')}}"></script>
<script src="{{asset('angular-app/controllers/RegistroController.js')}}"></script>
<script src="{{asset('angular-app/controllers/AdminController.js')}}"></script>
<script src="/angular-app/controllers/VacantesController.js"></script>
<script src="/angular-app/services/VacantesService.js"></script>
<script src="{{asset('js/ngMask.min.js')}}"></script>
<!--  Charts Plugin -->
<script src="{{asset('admin/js/chartist.min.js')}}"></script>
<!--  Dynamic Elements plugin -->
<script src="{{asset('admin/js/arrive.min.js')}}"></script>
<!--  PerfectScrollbar Library -->
<script src="{{asset('admin/js/perfect-scrollbar.jquery.min.js')}}"></script>
<!--  Notifications Plugin    -->
<script src="{{asset('admin/js/bootstrap-notify.js')}}"></script>
<!-- Material Dashboard javascript methods -->
<script src="{{asset('admin/js/material-dashboard.js?v=1.2.0')}}"></script>
<!-- Material Dashboard DEMO methods, don't include it in your project! -->
<script src="{{asset('admin/js/demo.js')}}"></script>

<script src="{{asset('js/isteven-multi-select.js')}}"></script>

{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script> --}}
{{-- <script>
    $(".js-theme-multiple").select2({
        theme: "classic",
        placeholder: "Selecciona los servicios de interés",
        allowClear: true
    });
</script> --}}
{{-- Lodash --}}
<script src="https://cdn.jsdelivr.net/npm/lodash@4.17.11/lodash.min.js"></script>


<!-- Pagination -->
<script type="text/javascript">
    $(document).ready(function() {
        demo.initDashboardPageCharts();
    });
</script>

</html>
