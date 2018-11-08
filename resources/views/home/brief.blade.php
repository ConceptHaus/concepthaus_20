@extends('layouts.app')

@section('content')

<div ng-controller="RegistroController" ng-cloak>
  <h2 class="title-general title-movil">
      <img class="img-icon-title" src="{{asset('img/conceptRight.svg')}}" alt="ConceptHaus"> Brief
  </h2>
  <p class="subtitle-general">Llena este formulario para saber más de tú idea y poder ayudarte.</p>
  <div class="d-flex justify-content-center">
    <div class="col-xl-6 col-md-8">
      <form id="formBrief">
        {{ csrf_field() }}
        <div class="form-group">
          <label for="pregunta_uno" class="description-p small-gray-brief">¿Cuál es el nombre de tú idea o empresa?</label>
          <textarea class="form-control" id="nombre" ng-model="formBrief.nombre" name="nombre"></textarea>
          {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
        </div>
        <div class="form-group">
          <label for="pregunta_uno" class="description-p small-gray-brief">¿Cuál es el propósito del negocio?</label>
          <textarea class="form-control" id="pregunta_uno" ng-model="formBrief.pregunta_uno" name="pregunta_uno"></textarea>
          {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
        </div>
        <div class="form-group">
          <label for="pregunta_dos" class="description-p small-gray-brief">¿Cuáles son tus ventajas competitivas, fuerzas y debilidades?</label>
          <textarea class="form-control" id="pregunta_dos" ng-model="formBrief.pregunta_dos" name="pregunta_dos"></textarea>
          {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
        </div>
        <div class="form-group">
          <label for="pregunta_tres" class="description-p small-gray-brief">¿Primordialmente, a qué público te diriges?</label>
          <textarea class="form-control" id="pregunta_tres" ng-model="formBrief.pregunta_tres" name="pregunta_tres"></textarea>
          {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
        </div>
        <div class="form-group">
          <label for="pregunta_cuatro" class="description-p small-gray-brief"> COMPETENCIA ¿Conoces a empresas similares a la tuya en México o en el extranjero?, ¿qué hace a tu empresa diferente de los demás?</label>
          <textarea class="form-control" id="pregunta_cuatro" ng-model="formBrief.pregunta_cuatro" name="pregunta_cuatro"></textarea>
          {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
        </div>
        <div class="form-group">
          <label for="pregunta_cinco" class="description-p small-gray-brief">¿Cuáles son las metas (corto y largo plazo) ?, ¿cómo imaginas la evolución del negocio en el tiempo?</label>
          <textarea class="form-control" id="pregunta_cinco" ng-model="formBrief.pregunta_cinco" name="pregunta_cinco"></textarea>
          {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
        </div>
        <div class="form-group">
          <label for="pregunta_seis" class="description-p small-gray-brief">¿Cómo imaginas la evolución del negocio en el tiempo?</label>
          <textarea class="form-control" id="pregunta_seis" ng-model="formBrief.pregunta_seis" name="pregunta_seis"></textarea>
          {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
        </div>
        <div class="form-group">
          <label for="pregunta_siete" class="description-p small-gray-brief">¿Qué es lo que quisieras comunicar con la identidad?</label>
          <textarea class="form-control" id="pregunta_siete" ng-model="formBrief.pregunta_siete" name="pregunta_siete"></textarea>
          {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
        </div>
        <div class="form-group">
          <label for="pregunta_ocho" class="description-p small-gray-brief">¿Cómo te gustaría que tu identidad/marca fuera percibida?, ¿existen atributos específicos con los que te gustaría relacionarla?</label>
          <textarea class="form-control" id="pregunta_ocho" ng-model="formBrief.pregunta_ocho" name="pregunta_ocho"></textarea>
          {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
        </div>
        <div class="form-group">
          <label for="pregunta_nueve" class="description-p small-gray-brief">¿Existe alguna consideración que debamos tomar en cuenta en el diseño, tono, manera o estilo visual?</label>
          <textarea class="form-control" id="pregunta_nueve" ng-model="formBrief.pregunta_nueve" name="pregunta_nueve"></textarea>
          {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
        </div>
        <div class="form-group">
          <label for="pregunta_diez" class="description-p small-gray-brief">¿Tienes alguna referencia conceptual o formal que te gustaría compartir con nosotros?</label>
          <textarea class="form-control" id="pregunta_diez" ng-model="formBrief.pregunta_diez" name="pregunta_diez"></textarea>
          {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
        </div>
        <div class="form-group">
          <label for="pregunta_once" class="description-p small-gray-brief">Tres palabras que definan tu empresa.</label>
          <textarea class="form-control" id="pregunta_once" ng-model="formBrief.pregunta_once" name="pregunta_once"></textarea>
          {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
        </div>
        <button type="submit" ng-click="registroBrief(formBrief)" class="btn" ng-disabled="!(formBrief.nombre) || !(formBrief.pregunta_uno) || !(formBrief.pregunta_dos) || !(formBrief.pregunta_tres) || !(formBrief.pregunta_cuatro) || !(formBrief.pregunta_cinco) || !(formBrief.pregunta_seis) || !(formBrief.pregunta_siete) || !(formBrief.pregunta_ocho) || !(formBrief.pregunta_nueve) || !(formBrief.pregunta_diez) || !(formBrief.pregunta_once)">Enviar</button>
      </form>
    </div>
  </div>

@endsection
