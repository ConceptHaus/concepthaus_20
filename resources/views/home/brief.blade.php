@extends('layouts.app')

@section('content')

<div ng-controller="WelcomeController" ng-cloak>
  <h2 class="title-general">
      <img class="img-icon-title" src="{{asset('img/conceptRight.svg')}}" alt="ConceptHaus"> Brief
  </h2>
  <p class="subtitle-general">Llena este formulario para saber más de tú idea y poder ayudarte.</p>
  <div class="d-flex justify-content-center">
    <div class="col-6">
      <form>
        <div class="form-group">
          <label for="pregunta_uno" class="description-p c-gray">¿Cuál es el propósito del negocio?</label>
          <textarea class="form-control" id="pregunta_uno"></textarea>
          {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
        </div>
        <div class="form-group">
          <label for="pregunta_dos" class="description-p c-gray">¿Cuáles son tus ventajas competitivas, fuerzas y debilidades?</label>
          <textarea class="form-control" id="pregunta_dos"></textarea>
          {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
        </div>
        <div class="form-group">
          <label for="pregunta_tres" class="description-p c-gray">¿Primordialmente, a qué público te diriges?</label>
          <textarea class="form-control" id="pregunta_tres"></textarea>
          {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
        </div>
        <div class="form-group">
          <label for="pregunta_cuatro" class="description-p c-gray"> COMPETENCIA ¿Conoces a empresas similares a la tuya en México o en el extranjero?, ¿qué hace a tu empresa diferente de los demás?</label>
          <textarea class="form-control" id="pregunta_cuatro"></textarea>
          {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
        </div>
        <div class="form-group">
          <label for="pregunta_cinco" class="description-p c-gray">¿Cuáles son las metas (corto y largo plazo) ?, ¿cómo imaginas la evolución del negocio en el tiempo?</label>
          <textarea class="form-control" id="pregunta_cinco"></textarea>
          {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
        </div>
        <div class="form-group">
          <label for="pregunta_seis" class="description-p c-gray">¿Cómo imaginas la evolución del negocio en el tiempo?</label>
          <textarea class="form-control" id="pregunta_seis"></textarea>
          {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
        </div>
        <div class="form-group">
          <label for="pregunta_siete" class="description-p c-gray">¿Qué es lo que quisieras comunicar con la identidad?</label>
          <textarea class="form-control" id="pregunta_siete"></textarea>
          {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
        </div>
        <div class="form-group">
          <label for="pregunta_ocho" class="description-p c-gray">¿Cómo te gustaría que tu identidad/marca fuera percibida?, ¿existen atributos específicos con los que te gustaría relacionarla?</label>
          <textarea class="form-control" id="pregunta_ocho"></textarea>
          {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
        </div>
        <div class="form-group">
          <label for="pregunta_nueve" class="description-p c-gray">¿Existe alguna consideración que debamos tomar en cuenta en el diseño, tono, manera o estilo visual?</label>
          <textarea class="form-control" id="pregunta_nueve"></textarea>
          {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
        </div>
        <div class="form-group">
          <label for="pregunta_diez" class="description-p c-gray">¿Tienes alguna referencia conceptual o formal que te gustaría compartir con nosotros?</label>
          <textarea class="form-control" id="pregunta_diez"></textarea>
          {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
        </div>
        <div class="form-group">
          <label for="pregunta_once" class="description-p c-gray">Tres palabras que definan tu empresa.</label>
          <textarea class="form-control" id="pregunta_once"></textarea>
          {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
        </div>
        <button type="submit" class="btn">Enviar</button>
      </form>
    </div>
  </div>

@endsection
