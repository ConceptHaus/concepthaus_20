@extends('layouts.appAdmin')
<style media="screen">
  .loading-img{
    width: 80px !important;
    height: 80px !important;
    margin-top: 10px !important;
  }
</style>
@section('content')
    <div class="container-fluid" ng-controller="AdminController" ng-cloak>
    <div class="row">
        <div class="col-md-12">
            <div class="card card-transparent">
                <div class="card-header card-title-gral" data-background-color="white">
                    <h4 class="title">Leads / Cerrados </h4>
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
                    <p class="category">Total de leads</p>
                    <h3 class="title">{{count($registros)}}</h3>
                </div>
                <div class="card-footer">
                    <div class="stats">
                        <i class="material-icons">local_offer</i> Total de leads.
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
                        <p class="category">Cerrados</p>
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
                    <div class="ct-chart" id="emailsSubscriptionChartCerrado"></div>
                </div>
                <div class="card-content">
                    <p class="category">Leads por mes</p>
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
                                            <option value="1">Recibido</option>
                                            <option value="5">En Proceso</option>
                                            <option value="3">Cerrado</option>
                                            <option value="4">Cotizado</option>
                                            <option value="2">No viable</option>
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
                        Si deseas filtrar tu información utiliza el rango de fechas que deseas consultar, por estatus o fuente.
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
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                          {{-- dir-paginate="registro in statusCheck | itemsPerPage: 15 --}}
                            <tr ng-repeat="registro in statusCheck | filter:search | filter:{id_status:fecha.selectTypeStatus} | filter:{fuente:fecha.selectTypeFuente} | orderBy:sortType:sortReverse | limitTo:10">
                                <td><% registro.id_registro %></td>
                                <td>
                                    <i ng-if="registro.fuente == 'Google'" class="fab fa-google google" aria-hidden="true"></i>
                                    <i ng-if="registro.fuente == 'Facebook'" class="fab fa-facebook-f facebook" aria-hidden="true"></i>
                                    <p ng-if="registro.fuente != 'Facebook' && registro.fuente != 'Google'"><% registro.fuente %></p>
                                </td>
                                <td>
                                  <span ng-if="registro.proyecto != null">
                                      <% registro.proyecto %>
                                  </span>
                                  <span ng-if="registro.proyecto == null">
                                        <% registro.pivot_forms.tipo %>
                                  </span>
                                </td>
                                <td><% registro.empresa %></td>
                                <td><% registro.fecha_registro.fecha_completa %></td>
                                <td>
                                    <i class="material-icons txt-blue">check</i>
                                </td>
                                <td>
                                    <a ng-href="/registro/detalle/<% registro.id_registro %>"><button type="button" class="btn btn-gray btn-table-action" style="padding: 12px 20px; margin-right: 5px;"><i class="material-icons">border_color</i></button></a>
                                    <button type="button" class="btn btn-gray btn-table-action" ng-click="deleteLead(registro)" style="padding: 12px 20px; margin: 0;"><i class="material-icons">delete_sweep</i></button>
                                    <a href="mailto:<% registro.correo %>?&subject=ConceptHaus&body=Hola,%20gracias%20por%20contactarnos,%20hemos%20recibido%20tu%20solicitud%20de%20información.%20En%20breve%20nuestro%20equipo%20de%20ventas%20se%20pondrá%20en%20contacto%20contigo.%20ConceptHaus…%20#AccentingEverything."><button type="button" class="btn btn-gray btn-table-action btn-mail"><i class="far fa-envelope" aria-hidden="true"></i></button></a>
                                    <a id="whatsapp-message" href="https://api.whatsapp.com/send?phone=521<% registro.telefono %>&amp;text=Hola, gracias por contactarnos, hemos recibido tu solicitud de información. En breve nuestro equipo de ventas se pondrá en contacto contigo. ConceptHaus… #AccentingEverything." target="_blank"><button type="button" class="btn btn-gray btn-table-action btn-whatsapp"><i class="fab fa-whatsapp"></i></button></a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div ng-show='show'>
                      <center>
                        <img class="loading-img" src="{{asset('img/loading_concept.gif')}}" alt="loader">
                      </center>
                    </div>
                    <dir-pagination-controls></dir-pagination-controls>
                    @if(count($socios) == 0)
                    <div class="content-msg-empty">
                        <h5 class="text-center">No hay leads registrados.</h5>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
