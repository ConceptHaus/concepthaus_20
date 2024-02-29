@extends('layouts.appServiceBranding') @section('content')

<style>
        /* Estilos para el contenedor del textarea */
        .textarea-container {
            position: relative;
        }

        @media only screen and (max-width: 767px) {
            #plug {
                /* Tus estilos CSS van aquí */
                margin-bottom: 20px !important;
                margin-right: 68px !important;
                /* Otros estilos que desees aplicar */
            }
        }

        html, body {
            max-width: 100%;
            overflow-x: hidden;
        }

        /* Estilos para el textarea */
        .textarea-container textarea {
            width: 100%;
            height: 100px; /* Ajusta la altura según tus necesidades */
            resize: none; /* Evita que el usuario pueda redimensionar el textarea */
        }

        /* Estilos para el texto predeterminado */
        .default-text {
            position: absolute;
            top: 5px; /* Ajusta la posición superior según tus necesidades */
            left: 23px; /* Ajusta la posición izquierda según tus necesidades */
            pointer-events: none; /* Permite hacer clic a través del texto predeterminado */
            color: #8f9194;
            font-size: 14px;
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
            font-weight: 300;
        }

        #medio{
            background-color: #efefef !important;
        }
        span.msg-error{
            color: #FF0000 !important;
        }
        .error-text{
            color: #FF0000 !important;
        }
        p.ng-scope{
            color: #e73c30 !important;
        }

        select option[disabled] {
            color: #FFFFFF !important;
        }
        select{
            color: #8f9194 !important;
            font-size: 14px !important;
            font-weight: 300 !important;
        }
</style>
<div id="branding" ng-controller="ProyectosController"> 
        <br>
        <br> 
        <br>
        <!--Imagen CH-->
        <div class="col-md-12 text-center interiorPuerta">
            <img class="logo" src="{{asset('img/concept_haus-origin.png')}}">
        </div>
        <!--Texto-->
        <section id="home-doors-interior">
        <div class="container">
            <div class="row">
                <div class="col-md-6 text-center info-descripBranding">
                    <p class="text-small small-gray text-left">
                        <span class="c-grayLight">+ Benchmarking.</span>
                        Realizamos un análisis de la competencia.
                    </p>
                    <p class="text-small small-gray text-left">
                        <span class="c-grayLight">+ Naming.</span>
                        Creamos propuestas únicas y creativas de posibles nombres hasta llegar al nombre ideal para el negocio; siempre tomando en cuenta su viabilidad de registro ante el IMPI.
                    </p>
                    <p class="text-small small-gray text-left">
                        <span class="c-grayLight">+ Concepto creativo.</span>
                        Creamos un concepto que refleje el core del negocio, los elementos visuales que aluden al nombre y los valores a comunicar.
                    </p>
                    <p class="text-small small-gray text-left">
                        <span class="c-grayLight">+ Propuestas de identidad corporativa.</span>
                        Se generan 3 diferentes caminos gráficos justificados creativamente; a partir de la versión seleccionada por el cliente se realizan las diferentes aplicaciones gráficas previamente acordadas.
                    </p>
                </div>
                <div class="col-md-6 text-center info-descripBranding">
                    <p class="text-small small-gray text-left">
                        <span class="c-grayLight">+ Manual de identidad.</span>
                        Construimos un manual de identidad en donde definimos la forma en que se comporta gráficamente nuestra identidad en sus diferentes aplicaciones on y offline. Sus usos y restricciones, pantones, patronajes, tipografías, áreas de protección, etc.
                    </p>
                    <p class="text-small small-gray text-left">
                        <span class="c-grayLight">+ Slogan.</span>
                        Cuando la marca lo requiere, se propone una frase a través de la cual se comunica de manera puntual, amigable y atractiva los valores principales de la marca.
                    </p>
                    <p class="text-small small-gray text-left">
                        <span class="c-grayLight">+ Registro de marca.</span>
                        Realizamos el proceso de registro en la clase correspondiente ante el Instituto Mexicano de Propiedad Intelectual, por sus siglas IMPI.
                    </p>
                </div>
            </div>
        </div>
    </section>
    <!--Formulario-->
    <section class="contact-branding" ng-controller="RegistroController as contacto">
        <div class="row">
            <div class="col-md-6">
                <!-- <h4 class="title-general c-gray">Identidad Corporativa</h4> -->
            </div>
            <div class="col-md-6">
                <form id="contactoForm" name="contactoForm">
                    {{ csrf_field() }}
                    <input type="text" class="form-control" id="fuente" name="fuente" ng-model="contacto.fuente" ng-init="contacto.fuente='Google'"
                        hidden required>
                    <input type="text" class="form-control" id="tipo" name="tipo" ng-model="contacto.tipo" ng-init="contacto.tipo='Branding'"
                        hidden required>
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="nombre" name="nombre" ng-model="contacto.nombre" placeholder="Nombre" required>
                            <span class="msg-error error-text" ng-messages="contactoForm.nombre.$error" ng-if="contactoForm.nombre.$touched">
                                <div ng-messages-include="/messages_error.html"></div>
                            </span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <input type="email" class="form-control input-ajust" id="correo" name="correo" ng-model="contacto.correo" placeholder="Correo" required>
                            <span class="msg-error" ng-messages="contactoForm.correo.$error" ng-if="contactoForm.correo.$touched">
                                <div ng-messages-include="/messages_error.html"></div>
                            </span>
                        </div>
                        <div class="col-sm-6">
                            <!-- <input type="text" class="form-control" id="telefono" name="telefono" mask="9999999999" ng-model="contacto.telefono" ng-minlength="8"
                                placeholder="Teléfono" required> -->
                                <input type="number" class="form-control" id="telefono" name="telefono" 
                                    ng-model="contacto.telefono" ng-minlength="10" ng-maxlength="10"
                                    pattern="[0-9]{10}"
                                    maxlength="10"
                                    placeholder="Teléfono" required>
                            <span class="msg-error" ng-messages="contactoForm.telefono.$error" ng-if="contactoForm.telefono.$touched">
                                <div ng-message="required"> <p class="ng-scope">Este campo es obligatorio.</p></div>
                                <div ng-message="minlength"><p class="ng-scope">El teléfono debe ser de 10 dígitos.</p></div>
                                <div ng-message="maxlength"><p class="ng-scope">El teléfono debe ser de 10 dígitos.</p></div>
                                <div ng-message="pattern"> <p class="ng-scope">El teléfono debe contener solo números y ser de 10 dígitos.</p></div>
                                <!-- <div ng-messages-include="/messages_error.html"></div> -->
                            </span>
                        </div>
                    </div>
                   <!--  <div class="form-group row">
                        <div class="col-sm-12">
                        <input type="text" class="form-control" id="servicios" name="servicios" ng-model="contacto.servicios" placeholder="Servicios" required>
                            <span class="msg-error" ng-messages="contactoForm.servicios.$error" ng-if="contactoForm.servicios.$touched">
                                <div ng-messages-include="/messages_error.html"></div>
                            </span>
                            <input type="text" class="form-control" id="outputServicies" name="outputServicies" mask="9999999999" ng-model="contacto.outputServicies"
                                placeholder="Servicios" required>
                            <span class="msg-error" ng-messages="contactoForm.outputServicies.$error" ng-if="contactoForm.outputServicies.$touched">
                                <div ng-messages-include="/messages_error.html"></div>
                            </span>
                            <div isteven-multi-select
                                input-model="listServicies"
                                output-model="contacto.outputServicies"
                                button-label="icon name"
                                item-label="icon name maker"
                                tick-property="ticked"
                                class="formNewSelectServicio">
                            </div>
                            <span class="msg-error" ng-messages="contactoForm.outputServicies.$error" ng-if="contactoForm.outputServicies.$touched">
                                <div ng-messages-include="/messages_error.html"></div>
                            </span>


                        </div>
                    </div> -->
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="empresa" name="empresa" ng-model="contacto.empresa" placeholder="Empresa">
                            <!-- <span class="msg-error" ng-messages="contactoForm.empresa.$error" ng-if="contactoForm.empresa.$touched">
                                <div ng-messages-include="/messages_error.html"></div>
                            </span> -->
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-12">
                            <textarea class="form-control" id="mensaje" name="mensaje" ng-model="contacto.mensaje" placeholder="Mensaje" rows="4">
                            </textarea>
                            <!-- <div class="default-text" id="textoPredeterminado">¡Hola! Me interesa recibir información por parte de ConceptHaus para conocer más acerca de sus servicios.</div> -->
                            <!-- <span class="msg-error" ng-messages="contactoForm.mensaje.$error" ng-if="contactoForm.mensaje.$touched">
                                <div ng-messages-include="/messages_error.html"></div>
                            </span> -->
                        </div>
                       <!--  <script>
                        window.onload = function() {
                            var textarea = document.getElementById('mensaje');
                            textarea.value = "¡Hola! Me interesa recibir información por parte de ConceptHaus para conocer más acerca de sus servicios.";
                        };
                        </script> -->
                        <!-- <script>
                            // Obtener el textarea y el texto predeterminado
                            var textarea = document.getElementById('miTextarea');
                            var textoPredeterminado = document.getElementById('textoPredeterminado');

                            // Mostrar el texto predeterminado al cargar la página
                            textarea.addEventListener('input', function() {
                                if (textarea.value === '') {
                                    textoPredeterminado.style.display = 'block';
                                } else {
                                    textoPredeterminado.style.display = 'none';
                                }
                            });

                            // Ocultar el texto predeterminado cuando el usuario hace clic en el textarea
                            textarea.addEventListener('click', function() {
                                textoPredeterminado.style.display = 'none';
                            });
                        </script> -->
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-12">
                            <!-- <label for="medio">Medio de contacto preferido</label> -->
                            <select name="Medio de contacto" class="formNewSelectServicio form-control" id="medio" name="medio" ng-model="contacto.medio" required>
                            <option value="" disabled selected>Medio de contacto preferido</option>
                                <option value="Whatsapp" selected>Whatsapp</option>
                                <option value="Correo">Correo</option>
                                <option value="Teléfono">Teléfono</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row text-center">
                        <div class="col-sm-12">
                            <button class="btn" id="FormBranding" ng-click="saveDataContact(contacto, contactoForm)" ng-disabled="!(contacto.nombre) || !(contacto.correo) || !(contacto.telefono)|| !(contacto.medio)">
                                <span style="display: flex;
                                            flex-direction: row;
                                            align-content: center;
                                            align-items: baseline;
                                            justify-content: center;">
                                    Enviar
                                </span>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-sm"></div>
        </div>
    </section>
    <section id="plug">
        <a href="{{ url('/branding/#contact') }}">
            <div class="plug-content text-center">
                <img src="{{asset('img/home-elements/Contacto_Haus.png')}}" />
                <img class="top" src="{{asset('img/home-elements/Contacto_Haus2.png')}}" />
            </div>
        </a>
    </section>
    <section id="gridInterior" class="container-fluid" ng-controller="WelcomeController">

        <div class="row">
            <!-- project-animate -->
            <div class="col-md-3 w25" ng-repeat="project in collectionConcept | filter:{ fields: 'Branding' }">
                <div class="containerProject project-effect">
                    <a class="projectName" href="{{url('proyecto/<%project.id%>')}}" target="_self">
                        <figure class="effect-goliath">
                            <img ng-src="<% project.covers.original %>" />
                            <figcaption>
                                <p class="projectCliente">
                                    <span class="title">
                                        <% project.name %>
                                    </span>
                                    <br>
                                    <span ng-repeat="field in project.fields">
                                        <% field %>
                                    </span>
                                </p>
                            </figcaption>
                        </figure>
                    </a>
                </div>
            </div>
        </div>

    </section>
</div>
@endsection
