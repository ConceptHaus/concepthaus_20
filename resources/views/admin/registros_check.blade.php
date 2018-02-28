@extends('layouts.appAdmin')

@section('content')
    <div class="container-fluid" ng-controller="AdminController" ng-cloak>
    <div class="row">
        <div class="col-md-12">
            <div class="card card-transparent">
                <div class="card-header card-title-gral" data-background-color="white">
                    <h4 class="title">Solicitudes / Cerradas </h4>
                    <p class="category">En esta sección se podrán visualizar las solicitudes que se encuentran cerradas.</p>
                    <img src="{{asset('img/logo/concept.svg')}}" class="ajust-top" alt="Concept Haus">
                </div>
            </div>
        </div>
    </div>

    <div class="row cards-count-info">
        <div class="col-sm-6 col-md-6 col-lg-3">
            <div class="card card-stats">
                <a href="{{url('/registros')}}">
                    <div class="card-header" data-background-color="grayDark">
                        <img src="{{asset('admin/img/icons/contact-mail.svg')}}" alt="BeGrand®">
                    </div>
                </a>
                <div class="card-content">
                    <p class="category">Total de solicitudes</p>
                    <h3 class="title">{{count($registros)}}</h3>
                </div>
                <div class="card-footer">
                    <div class="stats">
                        <i class="material-icons">local_offer</i> Total de solicitudes.
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-6 col-lg-3">
                <div class="card card-stats">
                    <div class="card-header" data-background-color="blue">
                        <img src="{{asset('admin/img/icons/contact-check.svg')}}" alt="BeGrand®">
                    </div>
                    <div class="card-content">
                        <p class="category">Cerradas</p>
                        <h3 class="title">{{count($socios)}}</h3>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                            <i class="material-icons">local_offer</i>  Total de cierres.
                        </div>
                    </div>
                </div>
        </div>
        <div class="col-sm-6 col-md-6 col-lg-6">
            <div class="card">
                <div class="card-header card-chart" data-background-color="grayDark">
                    <div class="ct-chart" id="emailsSubscriptionChart"></div>
                </div>
                <div class="card-content">
                    <p class="category">Solicitudes por mes</p>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card card-stats">
                <div class="card-content content-filter-date">

                    <div class="row">
                        <div class="col-xs-12 col-sm-9 col-md-9">
                            <div class="row">
                                <div class="col-xs-12 col-sm-3 col-md-3">
                                    <div class="form-group">
                                        <select class="form-control" id="select-type" name="select-type" ng-model="fecha.selectTypeStatus">
                                            <option value="" disabled selected>Estatus</option>
                                            <option value="1">En Proceso</option>
                                            <option value="2">Socios</option>
                                            <option value="3">No viable</option>
                                            <option value="">Todos</option>
                                        </select>
                                    </div> 
                                </div>
                                <div class="col-xs-12 col-sm-3 col-md-3">
                                    <div class="form-group">
                                        <select class="form-control" id="select-type" name="select-type" ng-model="fecha.selectTypeFuente">
                                            <option value="" disabled selected>Fuente</option>
                                            <option value="Google">Google</option>
                                            <option value="Facebook">Facebook</option>
                                            <option value="">Todos</option>
                                        </select>
                                    </div> 
                                </div>
                                <div class="col-xs-12 col-sm-3 col-md-3">
                                    <input class="form-control" type="date" id="fechaInicial" name="fechaInicial" ng-model="fecha.inicial" placeholder="yyyy-MM-dd" required/>
                                </div>
                                <div class="col-xs-12 col-sm-3 col-md-3">
                                    <input class="form-control" type="date" id="fechaFinal" name="fechaFinal" ng-model="fecha.final" placeholder="yyyy-MM-dd" required/>
                                </div>
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-3 col-md-3">
                            <button type="submit" class="btn btn-gray btn-filters" ng-click="filterTableDate(fecha)"><i class="fa fa-filter" aria-hidden="true"></i> Filtrar</button>
                            {{--  <button type="submit" class="btn btn-white btn-filters" ng-disabled="!(fecha.inicial) || !(fecha.final) || !(fecha.selectTypeStatus == 0 || fecha.selectTypeStatus == 1 || fecha.selectTypeStatus == 2 || fecha.selectTypeStatus == '' )" ng-click="exportTableDate(fecha)"><i class="fa fa-file-excel-o" aria-hidden="true"></i> Descargar</button>  --}}
                        </div>
                    </div>

                </div>
                <div class="card-footer">
                    <div class="stats">
                        Si deseas filtrar tu información utiliza el rango de fechas que deseas consultar, si la opción es descargar el reporte en formato excel deberás acompletar los campos fecha inicial, fecha final y estatus.
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-content table-responsive">
                    <div class="row">
                        <div class="col-md-12">
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
                                    <a ng-click="sortType = 'nombre'; sortReverse = !sortReverse">
                                        Nombre
                                        <span ng-hide="sortType == 'nombre' && (sortReverse || !sortReverse)" class="fa fa-sort"></span>
                                        <span ng-show="sortType == 'nombre' && !sortReverse" class="fa fa-sort-asc"></span>
                                        <span ng-show="sortType == 'nombre' && sortReverse" class="fa fa-sort-desc"></span>
                                    </a>
                                </th>
                                <th scope="col" data-tablesaw-priority="1">
                                    <a ng-click="sortType = 'correo'; sortReverse = !sortReverse">
                                        Correo
                                        <span ng-hide="sortType == 'correo' && (sortReverse || !sortReverse)" class="fa fa-sort"></span>
                                        <span ng-show="sortType == 'correo' && !sortReverse" class="fa fa-sort-asc"></span>
                                        <span ng-show="sortType == 'correo' && sortReverse" class="fa fa-sort-desc"></span>
                                    </a>
                                </th>
                                <th scope="col" data-tablesaw-priority="2">
                                    <a ng-click="sortType = 'telefono'; sortReverse = !sortReverse">
                                        Teléfono
                                        <span ng-hide="sortType == 'telefono' && (sortReverse || !sortReverse)" class="fa fa-sort"></span>
                                        <span ng-show="sortType == 'telefono' && !sortReverse" class="fa fa-sort-asc"></span>
                                        <span ng-show="sortType == 'telefono' && sortReverse" class="fa fa-sort-desc"></span>
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
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr ng-repeat="registro in statusCheck | filter:search | filter:{id_status:fecha.selectTypeStatus} | filter:{fuente:fecha.selectTypeFuente} | orderBy:sortType:sortReverse | limitTo:10">
                                <td><% registro.id_registro %></td>
                                <td>
                                    <i ng-if="registro.fuente == 'Google'" class="fab fa-google google" aria-hidden="true"></i>
                                    <i ng-if="registro.fuente == 'Facebook'" class="fab fa-facebook-f facebook" aria-hidden="true"></i>
                                </td>
                                <td><% registro.nombre %></td>
                                <td><% registro.correo %></td>
                                <td><% registro.telefono %></td>
                                <td><% registro.fecha_registro.fecha_completa %></td>
                                <td>
                                    <i ng-if="registro.pivot_status.id_status == 1" class="material-icons txt-gray">access_time</i>
                                    <i ng-if="registro.pivot_status.id_status == 2" class="material-icons txt-blue">check</i>
                                    <i ng-if="registro.pivot_status.id_status == 3" class="material-icons txt-red">close</i>
                                </td>
                                <td><a ng-href="/registro/detalle/<% registro.id_registro %>"><button type="button" class="btn btn-gray" style="margin: 0;"><i class="material-icons">border_color</i> Detalle</button></a></td>
                            </tr> 
                        </tbody>
                    </table>
                    <dir-pagination-controls></dir-pagination-controls>
                    @if(count($socios) == 0)
                    <div class="content-msg-empty">
                        <h5 class="text-center">No hay solicitudes registradas.</h5>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
  
</div>
@endsection