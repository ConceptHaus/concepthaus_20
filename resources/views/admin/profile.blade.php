@extends('layouts.appAdmin')

@section('content')
    <div id="profile" class="container-fluid">
        <div class="row">
            <div class="col-md-8" ng-controller="AdminController">
                <div class="card">
                    <div class="card-header" data-background-color="blue">
                        <h4 class="title">Perfil Usuario</h4>
                        <p class="category">Edita tu información de usuario y cambia tu contraseña.</p>
                    </div>
                    <div class="card-content">
                        <form method="POST">
                        <input type="hidden" name="id" class="form-control" ng-model="user.id = {{ Auth::user()->id }}">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Nombre</label>
                                        <input type="text" name="name" class="form-control" ng-model="user.name" ng-init="user.name = '{{ Auth::user()->name }}'">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Correo Electrónico</label>
                                        <input type="email" name="email" class="form-control" ng-model="user.email" ng-init="user.email = '{{ Auth::user()->email }}'">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                {{--  <div class="col-md-6">
                                    <a type="submit" class="btn btn-default pull-left" href="/logoutReset">Cambiar contraseña</a>
                                </div>  --}}
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary pull-right" ng-click="updateUser(user)">Actualizar Perfil</button>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </form>
                        {{--  <a href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                                Cerrar Sesión
                                            </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>  --}}
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-profile">
                    <div class="card-avatar">
                        <a href="#pablo">
                            <img class="img" src="{{asset('admin/img/beGrand-logo.png')}}"/>
                        </a>
                    </div>
                    <div class="content">
                        <h6 class="category text-gray">Administrador</h6>
                        <h4 class="card-title">{{ Auth::user()->name }}</h4>
                        <p class="card-content">
                            El administrador en este panel de control puede tener acceso a visualizar los desarrollos actuales mostrados en la plataforma de Be Grand® y administrar las solicitudes por desarrollo.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection