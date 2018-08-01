@extends('layouts.appAdmin')

@section('content')
    <div class="container-fluid" ng-controller="AdminController" ng-cloak>
        <div class="row cards-count-info">
            <div class="col-lg-12">
                <h4 class="title-total-gray">Total de leads: {{count($registros)}}</h4>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <a href="{{ url('/registros/recibidos') }}">
                        <div class="card-header" data-background-color="gray">
                            <img src="{{asset('admin/img/icons/contact-dev.svg')}}" alt="Concept Haus">
                        </div>
                    </a>
                    <div class="card-content">
                        <p class="category">Recibidos</p>
                        <h3 class="title">{{count($recibido)}}</h3>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                            <i class="material-icons">local_offer</i>  Total recibidos.
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <a href="{{ url('/registros/cotizados') }}">
                        <div class="card-header" data-background-color="orange">
                            <img src="{{asset('admin/img/icons/contact-dev.svg')}}" alt="Concept Haus">
                        </div>
                    </a>
                    <div class="card-content">
                        <p class="category">Cotizados</p>
                        <h3 class="title">{{count($cotizados)}}</h3>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                            <i class="material-icons">local_offer</i>  Total cotizados.
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <a href="{{ url('/registros/cerrados') }}">
                        <div class="card-header" data-background-color="blue">
                            <img src="{{asset('admin/img/icons/contact-check.svg')}}" alt="BeGrand®">
                        </div>
                    </a>
                    <div class="card-content">
                        <p class="category">Cerrados</p>
                        <h3 class="title">{{count($socios)}}</h3>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                            <i class="material-icons">local_offer</i>  Total cerrados.
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <a href="{{ url('/registros/no-viables') }}">
                        <div class="card-header" data-background-color="red">
                            <img src="{{asset('admin/img/icons/contact-error.svg')}}" alt="BeGrand®">
                        </div>
                    </a>
                    <div class="card-content">
                        <p class="category">No viable</p>
                        <h3 class="title">{{count($descartados)}}</h3>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                            <i class="material-icons">local_offer</i> Total no viables.
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header card-chart" data-background-color="grayDark">
                        <div class="ct-chart" id="dailySalesChart"></div>
                    </div>
                    <div class="card-content">
                        <h4 class="title">Semanal</h4>
                        <p class="category">
                            Solicitudes de la semana <b><% daysbefore %></b> al <b><% hoy %></b></p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header card-chart" data-background-color="grayDark">
                        <div class="ct-chart" id="emailsSubscriptionChart"></div>
                    </div>
                    <div class="card-content">
                        <h4 class="title">Mensual</h4>
                        <p class="category">Solicitudes por mes</p>
                    </div>
                </div>
            </div>
        </div>
        <!--
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="card">
                    <div class="card-header card-title-home" data-background-color="red">
                        <h4 class="title">Últimos leads</h4>
                        <img src="{{asset('img/logo/conceptWhite.svg')}}" alt="Concept Haus">
                    </div>

                    <div class="card-content table-responsive">   
                        <div class="row">
                            <div class="col-md-8">
                                <p class="category">Estos son los últimos 10 leads recibidos, filtra por columna o utiliza la funcionalidad de búsqueda.</p>  
                            </div>
                            <div class="col-md-4">
                                <form class="navbar-form navbar-right content-filter-search" role="search">
                                    <div class="form-group is-empty">
                                        <input type="text" class="form-control" ng-model="search" placeholder="Búsqueda">
                                        <span class="material-input"></span>
                                    </div>
                                    <button type="submit" class="btn btn-white btn-round btn-just-icon">
                                        <i class="material-icons">search</i>
                                        <div class="ripple-container"></div>
                                    </button>
                                </form>
                            </div>
                        </div>
                        <table class="tablesaw table-hover" data-tablesaw-mode="stack">
                            <thead class="text-success">
                                <tr>
                                    <th scope="col" data-tablesaw-priority="persist">
                                        <a ng-click="sortType = 'id_registro'; sortReverse = !sortReverse">
                                            Id
                                            <span ng-hide="sortType == 'id_registro' && (sortReverse || !sortReverse)" class="fa fa-sort"></span>
                                            <span ng-show="sortType == 'id_registro' && !sortReverse" class="fa fa-sort-asc"></span>
                                            <span ng-show="sortType == 'id_registro' && sortReverse" class="fa fa-sort-desc"></span>
                                        </a>
                                    </th>
                                    <th scope="col" data-tablesaw-priority="persist">
                                        <a ng-click="sortType = 'fuente'; sortReverse = !sortReverse">
                                            Fuente
                                            <span ng-hide="sortType == 'fuente' && (sortReverse || !sortReverse)" class="fa fa-sort"></span>
                                            <span ng-show="sortType == 'fuente' && !sortReverse" class="fa fa-sort-asc"></span>
                                            <span ng-show="sortType == 'fuente' && sortReverse" class="fa fa-sort-desc"></span>
                                        </a>
                                    </th>
                                    <th scope="col" data-tablesaw-sortable-default-col data-tablesaw-priority="3">
                                        <a ng-click="sortType = 'proyecto'; sortReverse = !sortReverse">
                                            Proyecto
                                            <span ng-hide="sortType == 'proyecto' && (sortReverse || !sortReverse)" class="fa fa-sort"></span>
                                            <span ng-show="sortType == 'proyecto' && !sortReverse" class="fa fa-sort-asc"></span>
                                            <span ng-show="sortType == 'proyecto' && sortReverse" class="fa fa-sort-desc"></span>
                                        </a>
                                    </th>
                                    <th scope="col" data-tablesaw-priority="1">
                                        <a ng-click="sortType = 'empresa'; sortReverse = !sortReverse">
                                            Empresa
                                            <span ng-hide="sortType == 'empresa' && (sortReverse || !sortReverse)" class="fa fa-sort"></span>
                                            <span ng-show="sortType == 'empresa' && !sortReverse" class="fa fa-sort-asc"></span>
                                            <span ng-show="sortType == 'empresa' && sortReverse" class="fa fa-sort-desc"></span>
                                        </a>
                                    </th>
                                    <th scope="col" data-tablesaw-priority="6">
                                        <a ng-click="sortType = 'fecha_completa'; sortReverse = !sortReverse">
                                            Fecha Registro
                                            <span ng-hide="sortType == 'fecha_completa' && (sortReverse || !sortReverse)" class="fa fa-sort"></span>
                                            <span ng-show="sortType == 'fecha_completa' && !sortReverse" class="fa fa-sort-asc"></span>
                                            <span ng-show="sortType == 'fecha_completa' && sortReverse" class="fa fa-sort-desc"></span>
                                        </a>
                                    </th>
                                    <th scope="col" data-tablesaw-priority="7">
                                        <a ng-click="sortType = 'id_status'; sortReverse = !sortReverse">
                                            Estatus
                                            <span ng-hide="sortType == 'id_status' && (sortReverse || !sortReverse)" class="fa fa-sort"></span>
                                            <span ng-show="sortType == 'id_status' && !sortReverse" class="fa fa-sort-asc"></span>
                                            <span ng-show="sortType == 'id_status' && sortReverse" class="fa fa-sort-desc"></span>
                                        </a>
                                    </th>
                                    <th scope="col">Acciones </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr ng-repeat="registro in registrosLastest | filter:search | orderBy:sortType:sortReverse">
                                    <td><% registro.id_registro %></td>
                                    <td>
                                        {{--  class="fuente"  --}}
                                        <i ng-if="registro.fuente == 'Google'" class="fab fa-google google" aria-hidden="true"></i>
                                        <i ng-if="registro.fuente == 'Facebook'" class="fab fa-facebook-f facebook" aria-hidden="true"></i>
                                        <p ng-if="registro.fuente != 'Facebook' && registro.fuente != 'Google'"><% registro.fuente %></p>
                                    </td>
                                    <td><% registro.proyecto %></td>
                                    <td><% registro.empresa %></td>
                                    <td><% registro.fecha_registro.fecha_completa %></td>
                                    <td>
                                        <i ng-if="registro.pivot_status.id_status == 1" class="material-icons txt-gray">access_time</i>
                                        <i ng-if="registro.pivot_status.id_status == 2" class="material-icons txt-blue">check</i>
                                        <i ng-if="registro.pivot_status.id_status == 3" class="material-icons txt-red">close</i>
                                        <i ng-if="registro.pivot_status.id_status == 4" class="material-icons txt-orange">insert_drive_file</i>                                        
                                    </td>
                                    <td>
                                        <a ng-href="/registro/detalle/<% registro.id_registro %>"><button type="button" class="btn btn-gray" style="padding: 12px 20px; margin-right: 5px;"><i class="material-icons">border_color</i></button></a>             
                                        <button type="button" class="btn btn-gray" ng-click="deleteLead(registro)" style="padding: 12px 20px; margin: 0;"><i class="material-icons">delete_sweep</i></button>
                                    </td>
                                </tr> 
                                {{--  <tr dir-paginate="registro in registrosLastest | filter:search | orderBy:sortType:sortReverse |itemsPerPage:15">
                                    <td><% registro.id_registro %></td>
                                    <td class="fuente">
                                        <i ng-if="registro.fuente == 'Google'" class="fab fa-google google" aria-hidden="true"></i>
                                        <i ng-if="registro.fuente == 'Facebook'" class="fab fa-facebook-f facebook" aria-hidden="true"></i>
                                        <p ng-if="registro.fuente != 'Facebook' && registro.fuente != 'Google'"><% registro.fuente %></p>
                                    </td>
                                    <td><% registro.nombre %></td>
                                    <td><% registro.empresa %></td>
                                    <td><% registro.fecha_registro.fecha_completa %></td>
                                    <td>
                                        <i ng-if="registro.pivot_status.id_status == 1" class="material-icons txt-gray">access_time</i>
                                        <i ng-if="registro.pivot_status.id_status == 2" class="material-icons txt-blue">check</i>
                                        <i ng-if="registro.pivot_status.id_status == 3" class="material-icons txt-red">close</i>
                                        <i ng-if="registro.pivot_status.id_status == 4" class="material-icons txt-orange">insert_drive_file</i>                                        
                                    </td>
                                    <td><a ng-href="/registro/detalle/<% registro.id_registro %>"><button type="button" class="btn btn-gray" style="margin: 0;"><i class="material-icons">border_color</i> Detalle</button></a></td>
                                </tr>   --}}
                            </tbody>
                            {{--  <dir-pagination-controls
                                max-size="5"
                                direction-links="true"
                                boundary-links="true" >
                            </dir-pagination-controls>  --}}
                        </table>

                        @if(count($registros) == 0)
                        <div class="content-msg-empty">
                            <h5 class="text-center">No hay leads registrados.</h5>
                        </div>
                        @endif
                    </div>
                </div>
            </div>-->
        </div>
    </div>
@endsection