@extends('layouts.appAdmin')

@section('content')
<div ng-controller="AdminController">
<div id="registro-detalle" class="row">
    <div class="col-lg-6 col-md-6 col-sm-6">

        <!-- Información general Registro -->
        <div class="card">
            <div class="card-header" data-background-color="grayDark">
                <h4 class="title">Solicitud</h4>
                <p class="category">Información general de la solicitud.</p>
            </div>
            
            <div class="card-content">
                <div class="card card-stats">
                    <a href="{{url('/registros')}}">
                        @if($info_user[0]['pivot_status']['id_status'] == 1)
                            <div class="card-header" data-background-color="gray">
                                <img src="{{asset('admin/img/icons/contact-mail.svg')}}" alt="Concept Haus">
                            </div>
                        @elseif($info_user[0]['pivot_status']['id_status'] == 2)
                            <div class="card-header" data-background-color="blue">
                                <img src="{{asset('admin/img/icons/contact-check.svg')}}" alt="Concept Haus">
                            </div>
                        @elseif($info_user[0]['pivot_status']['id_status'] == 3)
                            <div class="card-header" data-background-color="red">
                                <img src="{{asset('admin/img/icons/contact-error.svg')}}" alt="Concept Haus">
                            </div>
                        @elseif($info_user[0]['pivot_status']['id_status'] == 4)
                            <div class="card-header" data-background-color="orange">
                                <img src="{{asset('admin/img/icons/contact-check.svg')}}" alt="Concept Haus">
                            </div>
                        @endif
                    </a>
                    <div class="card-content">
                        <p class="category">No. de Solicitud: {{$info_user[0]['id_registro']}} </p>
                        @if($info_user[0]['pivot_status']['id_status'] == 2)
                            <p class="category">No. Cliente: {{$info_user[0]['no_socio']['no_socio']}} </p>
                        @endif
                        <p class="category">Fecha de registro: {{$info_user[0]['fecha_registro']['fecha_completa']}}</p>
                        @if($info_user[0]['pivot_status']['id_status'] == 1)
                            <h4 class="title txt-gray">{{$info_user[0]['pivot_status']['status']['status']}}</h4>
                        @elseif($info_user[0]['pivot_status']['id_status'] == 2)
                            <h4 class="title txt-blue">{{$info_user[0]['pivot_status']['status']['status']}}</h4>
                        @elseif($info_user[0]['pivot_status']['id_status'] == 3)
                            <h4 class="title txt-red">{{$info_user[0]['pivot_status']['status']['status']}}</h4>
                        @elseif($info_user[0]['pivot_status']['id_status'] == 4)
                            <h4 class="title txt-orange">{{$info_user[0]['pivot_status']['status']['status']}}</h4>
                        @endif
                    </div>
                </div>
                <div class="card card-stats card-info-form">
                    <form id="editarRegistro" name="contactoForm">
                        <input type="hidden" ng-model="contacto.id_registro" ng-init="contacto.id_registro = '{{$info_user[0]['id_registro']}}'">
                        <div class="row">
                            <div class="col-md-12">
                                <label class="label-registro">Cliente</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" ng-model="contacto.nombre" ng-init="contacto.nombre = '{{$info_user[0]['nombre']}}'" placeholder="Cliente" required>
                                <span class="msg-error" ng-messages="contactoForm.nombre.$error" ng-if="contactoForm.nombre.$touched">
                                    <div ng-messages-include="/messages_error.html"></div>
                                </span>
                            </div>
                            <div class="col-md-12">
                                <label class="label-registro">Empresa</label>
                                <input type="text" class="form-control" id="empresa" name="empresa" ng-model="contacto.empresa" ng-init="contacto.empresa = '{{$info_user[0]['empresa']}}'" placeholder="Empresa" required>
                                <span class="msg-error" ng-messages="contactoForm.empresa.$error" ng-if="contactoForm.empresa.$touched">
                                    <div ng-messages-include="/messages_error.html"></div>
                                </span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label class="label-registro">Proyecto</label>
                                {{-- @if($info_user[0]['proyecto'] !== null)
                                    <p class="info-registro">{{$info_user[0]['proyecto']}}</p>
                                @else
                                    <p class="info-registro" style="color: white;">S/P</p>
                                @endif --}}
                                <input type="text" class="form-control" id="proyecto" name="proyecto" ng-model="contacto.proyecto" ng-init="contacto.proyecto = '{{$info_user[0]['proyecto']}}'" placeholder="Proyecto" required>
                                <span class="msg-error" ng-messages="contactoForm.proyecto.$error" ng-if="contactoForm.proyecto.$touched">
                                    <div ng-messages-include="/messages_error.html"></div>
                                </span>
                            </div>
                            <div class="col-md-6">
                                <label class="label-registro">Teléfono</label>
                                {{-- <p class="info-registro">{{$info_user[0]['telefono']}}</p> --}}
                                <input type="text" class="form-control" id="telefono" name="telefono" mask="99999999999999999999" ng-model="contacto.telefono" ng-init="contacto.telefono = '{{$info_user[0]['telefono']}}'" ng-minlength="8"
                                placeholder="Teléfono">
                                <span class="msg-error" ng-messages="contactoForm.telefono.$error" ng-if="contactoForm.telefono.$touched">
                                    <div ng-messages-include="/messages_error.html"></div>
                                </span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label class="label-registro">Correo</label>
                                {{-- <p class="info-registro">{{$info_user[0]['correo']}}</p> --}}
                                <input type="email" class="form-control" id="correo" name="correo" ng-model="contacto.correo" ng-init="contacto.correo = '{{$info_user[0]['correo']}}'" placeholder="Correo">
                                <span class="msg-error" ng-messages="contactoForm.correo.$error" ng-if="contactoForm.correo.$touched">
                                    <div ng-messages-include="/messages_error.html"></div>
                                </span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label class="label-registro">Fuente de registro</label>
                                <p class="info-registro">{{$info_user[0]['fuente']}}</p>
                            </div>
                            <div class="col-md-6">
                                <label class="label-registro">Formulario de registro</label>
                                <p class="info-registro">{{$info_user[0]['pivot_forms']['tipo']}}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label class="label-registro">Nota</label>
                                {{-- <p class="info-registro">{{$info_user[0]['mensaje']}}</p> --}}
                                <textarea class="form-control" id="mensaje" name="mensaje" ng-model="contacto.mensaje" placeholder="Nota" rows="4" ng-init="contacto.mensaje = '{{$info_user[0]['mensaje']}}'" required></textarea>
                                <span class="msg-error" ng-messages="contactoForm.mensaje.$error" ng-if="contactoForm.mensaje.$touched">
                                    <div ng-messages-include="/messages_error.html"></div>
                                </span>
                            </div>
                        </div>
                        <div class="row content-servicios">
                            <div class="col-md-12">
                                <label class="label-registro">Servicios</label>
                                <div class="row">
                                    {{-- {{$info_user[0]['pivot_servicios']}} --}}
                                    @foreach ($info_user[0]['pivot_servicios'] as $servicio)
                                        <div class="col-md-6">
                                            <p>
                                                <img src="{{asset('img/logo/concept.svg')}}" alt="Concept Haus"> {{ $servicio->servicio }}
                                                <button class="btn btn-delete" ng-click="deleteServicie({{ $servicio }})">
                                                    <i class="far fa-trash-alt"></i>
                                                </button>
                                            </p>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="row select-servicies">
                                    <div     
                                    isteven-multi-select
                                    input-model="listServicies"
                                    output-model="contacto.outputServicies"
                                    button-label="icon name"
                                    item-label="icon name maker"
                                    tick-property="ticked">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row text-center">
                            <div class="col-sm-12">
                                <button class="btn btn-gray" id="EditDatosRegistro" ng-click="editDataLead(contacto, contactoForm)" style="margin-top: 30px;">ACtualizar</button>
                            </div>
                        </div>
                    </form>
                </div>

                @if($info_user[0]['pivot_status']['id_status'] == 1)
                <div class="card edit-status">
                    <div class="card-header" data-background-color="white">
                        <p class="category txt-grayDark">Modificación de estatus</p>
                    </div>
                    <div class="card-content text-center">
                        <button type="button" class="btn btn-red" data-toggle="modal" data-target=".bs-example-modal-sm"><img src="{{asset('admin/img/icons/contact-error.svg')}}" alt="Concept Haus"> No viable</button>
                        <button type="button" class="btn btn-orange" data-toggle="modal" data-target=".modalCotizado"><img src="{{asset('admin/img/icons/contact-error.svg')}}" alt="Concept Haus"> Cotizado</button>
                    </div>
                </div>
                @elseif($info_user[0]['pivot_status']['id_status'] == 4)
                <div class="card edit-status">
                    <div class="card-header" data-background-color="white">
                        <p class="category txt-grayDark">Modificación de estatus</p>
                    </div>
                    <div class="card-content text-center">
                        <button type="button" class="btn btn-red" data-toggle="modal" data-target=".bs-example-modal-sm"><img src="{{asset('admin/img/icons/contact-error.svg')}}" alt="Concept Haus"> No viable</button>                            
                        <button type="button" class="btn btn-blue" data-toggle="modal" data-target=".bs-example-modal-lg"><img src="{{asset('admin/img/icons/contact-check.svg')}}" alt="Concept Haus"> Cerrada</button>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
    <!-- ./ Información general Registro -->

    <!-- Seguimiento de registro -->
    <div class="col-lg-6 col-md-6 col-sm-6">
        <div class="card">
            <div class="card-header" data-background-color="grayDark">
                <h4 class="title">Seguimiento de solicitud</h4>
                <p class="category">Medios de contacto</p>
            </div>
            
            <div class="card-content">
                <div class="card card-stats card-info-form">
                    <form>
                        <div class="row">
                            <div class="col-md-4 contact-media">
                                <div class="form-check" ng-init="medio.id_registro = {{$info_user[0]['id_registro']}}">
                                    <input class="form-check-input" type="checkbox" ng-model="medio.correo" ng-true-value="1" ng-false-value="0" id="checkbox1" value="correo">
                                    <label class="form-check-label" for="checkbox2"><i class="far fa-envelope" aria-hidden="true"></i> Correo</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" ng-model="medio.telefono" ng-true-value="1" ng-false-value="0" id="checkbox2" value="telefono">
                                    <label class="form-check-label" for="checkbox2"><i class="fa fa-phone" aria-hidden="true"></i> Teléfono</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" ng-model="medio.whatsapp" ng-true-value="1" ng-false-value="0" id="checkbox3" value="Messenger">
                                    <label class="form-check-label" for="checkbox3"><i class="fab fa-facebook-messenger" aria-hidden="true"></i> Messenger</label>
                                </div>
                                
                            </div>
                            <div class="col-md-8">
                                <div class="form-group none-mt">
                                    <label>Agregar comentario de seguimiento</label>
                                    <textarea id="comentario" ng-model="medio.nota" name="comentario" class="form-control" rows="2"></textarea> 
                                </div>
                                <button type="button" ng-click="saveMedioComment(medio)" class="btn btn-white"><i class="material-icons">autorenew</i> Actualizar</button>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- Historial seguimiento -->
                <div class="card edit-status">
                    <div class="card-header" data-background-color="grayDark">
                        <p class="category">Historial</p>
                    </div>
                    <div class="card-content text-center">
                        <div class="row">
                            @if($info_user[0]['pivot_medios']->count())
                                @foreach($info_user[0]['pivot_medios'] as $medio)
                                    <!-- Card -->
                                    <div class="col-md-4 historial-contacto">
                                        <div class="card card-stats">
                                            <div class="titulo-medio">Medio de contacto</div>
                                            <p>
                                                @if($medio['medios_contacto']->medio == 'correo')
                                                    <i class="fa fa-envelope-o" aria-hidden="true"></i> 
                                                @elseif($medio['medios_contacto']->medio == 'llamada')
                                                    <i class="fa fa-phone" aria-hidden="true"></i>
                                                @elseif($medio['medios_contacto']->medio == 'whastapp')
                                                    <i class="fa fa-whatsapp" aria-hidden="true"></i>
                                                @endif
                                                {{$medio['medios_contacto']->medio}}
                                            </p>
                                            <div class="card-footer">
                                                <div class="stats">
                                                    <i class="material-icons">date_range</i> {{$medio->created_at}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <p>No se ha registrado ningún medio de contacto.</p>
                            @endif
                        </div>
                    </div>
                </div>
                <!-- ./ Historial seguimiento -->

                <!-- Comentarios de seguimiento -->
                <div class="card edit-status">
                        <div class="card-header" data-background-color="grayDark">
                            <p class="category">Comentarios</p>
                        </div>
                        <div class="card-content text-center">
                            <div class="row">
                                @if($info_user[0]['notas']->count())
                                    @foreach($info_user[0]['notas'] as $nota)
                                    <div class="col-md-12">
                                        <div class="comentario-contacto">
                                            <p class="date txt-gray"><i class="material-icons">date_range</i> {{$nota->created_at}}</p>
                                            <p class="comentario">{{$nota->nota}}</p>
                                        </div>
                                    </div>
                                    @endforeach
                                @else
                                    <p>No hay ningún comentario.</p>
                                @endif    
                            </div>
                        </div>
                    </div>
                    <!-- ./ Comentarios de seguimiento -->

            </div>
        </div>
    </div>
    <!-- ./ Seguimiento de registro -->
</div>



<!-- Modal Socios -->
<div class="modal fade bs-example-modal-lg" id="modalCheckStatus" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content" ng-init="registro.id_registro = {{$info_user[0]['id_registro']}}">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel">SOLICITUD CERRADA</h4>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group none-mt">
                        <label>No. de cliente</label>
                        <input type="text" class="form-control" id="no_socio" ng-model="registro.no_socio" name="no_socio">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-blue" ng-click="NewSocio(registro)">Aceptar</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal No Viable -->
<div class="modal fade bs-example-modal-sm" id="modalErrorStatus" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content" ng-init="registro.id_registro = {{$info_user[0]['id_registro']}}">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel">SOLICITUD DESCARTADA</h4>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group none-mt">
                        <label>Tipo</label>
                        <select class="form-control" id="exampleFormControlSelect1" ng-model="registro.id_motivo">
                            <option selected>Selecciona un motivo</option>
                            <option value="1">Ya era cliente</option>
                            <option value="2">No interesado</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Explica el motivo del por qué no es viable</label>
                        <textarea ng-model="registro.nota_motivo" id="comentario" name="comentario" class="form-control" rows="2"></textarea> 
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-red" ng-click="NoViable(registro)">No viable</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal Cotizado -->
<div class="modal fade modalCotizado" id="modalValued" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content" ng-init="registro.id_registro = {{$info_user[0]['id_registro']}}">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel">SOLICITUD COTIZADA</h4>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group none-mt">
                        <p>¿Deseas actualizar el estatus a cotizado?</p>
                        {{--  <input type="file" ng-model="registro.archivoCotizacion" id="archivoCotizacion" name="archivoCotizacion" class="form-control">  --}}
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-blue" ng-click="Valued(registro)">Aceptar</button>
            </div>
        </div>
    </div>
</div>
</div>

@endsection