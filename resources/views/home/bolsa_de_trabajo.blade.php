@extends('layouts.appBolsaTrabajo')

@section('content')

<div ng-controller="WelcomeController" ng-cloak>
  <!-- Section |  Bolsa de Trabajo Title -->
  <section id="home-description" class="style-mp">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-8 text-alignstitle">
          <h2 class="title-general mb-4 mt-0 px-titlegeneral">Bolsa de Trabajo</h2>
          <p class="subtitle-general px-auto px-titlegeneral">Oportunidades que te esperan.</p>
        </div>
        <div class="col-lg-4 text-aligns">
          <p>Diseño Desarrollo Web</p>
          <p>Administración Audiovisual Producción</p>
          <p>Content Manager Account Manager Lorem Ipsum</p>
        </div>
      </div>

    </div>
  </section>
  <!--hr -->
  <div class="container-fluid">
    <div class="row px-hr">
      <div class="col-1hr px-hrcol">
        <hr class="hr-gray">
      </div>
    </div>
  </div>

  <!-- Section | Bolsa de Trabajo Publicidad -->
  <section class="home-doorsmb">
    <div class="container-fluid">
      <div class="row">

        <div class="col-8 col-lg-8 text-alignstitle px-3 d-flex align-items-end">
          <p class="publicidad-title mb-0 px-0 border-leftbt"><img class="img-icon-publicidad" src="{{asset('img/conceptRight.svg')}}" alt="ConceptHaus">Publicidad</p>
        </div>
        <div class="col-4 col-lg-4 text-aligns">
          <p>3 Vacantes</p>
        </div>

      </div>

    </div>

  </section>

  <!-- Section | Bolsa de Trabajo Trainne 1-->
  <section id="home-doors" class="mb-4">
    <div class="container">
      <div class="row style-row">
        <div class="col-lg-6 py-3 px-5">
          <h2 class="title-form mb-4 mt-0">Trainne Diseño</h2>
          <p class="subtitle-red">Diseño Gráfico</p>
          <p class="subtitle-description p-22">Descripción <br>
        Lorem ipsum dolor sit amet consectetur adipiscing elit tempor mollis class ultricies, senectus nulla eget ad magna ligula porttitor non donec.Lorem ipsum dolor sit amet consectetur adipiscing elit tempor mollis class ultricies, senectus nulla eget ad magna ligula porttitor non donec. </p>
        </div>
        <div class="col-lg-6 py-3 px-5">
          <form>
            <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="inputEmail4">Aplicar</label>
                    <input type="text" class="form-control  background-gray" placeholder="Nombre">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="inputEmail4" class="color-transparent">Apellido</label>
                    <input type="text" class="form-control background-gray" placeholder="Apellido">
                  </div>
                  <div class="form-group col-md-12">
                    <input type="email" class="form-control background-gray" id="inputEmail4" placeholder="Correo">
                  </div>
                </div>
                <div class="form-row align-items-center">
                  <div class="col-3 my-1">
                    <div class="custom-control custom-checkbox mr-sm-2">
                      <input type="checkbox" class="custom-control-input" id="customControlAutosizing">
                      <label class="custom-control-label cv-style" for="customControlAutosizing">CV</label>
                    </div>
                  </div>
                  <div class="col-3 my-1">
                    <button type="submit" class="btn btn-gray">SUBIR</button>
                  </div>
                  <div class="col-6 my-1">
                    <input type="url" class="form-control background-gray" placeholder="Portafolio">
                    <small id="passwordHelpBlock" class="form-text text-muted subtitle-url">
                          *Url Portafolio
                    </small>
                  </div>


                </div>
                <div class="col-12 d-flex justify-content-center align-items-center">
                  <button type="submit" class="btn btn-red">ENVIAR</button>
                </div>
          </form>

        </div>



      </div>
    </div>
  </section>
  <!-- Section | Bolsa de Trabajo Trainne 2-->
  <section id="home-doors" class="mb-4">
    <div class="container">
      <div class="row style-row">
        <div class="col-lg-6 py-3 px-5">
          <h2 class="title-form mb-4 mt-0">Trainne Diseño</h2>
          <p class="subtitle-red">Diseño Gráfico</p>
          <p class="subtitle-description p-22">Descripción <br>
        Lorem ipsum dolor sit amet consectetur adipiscing elit tempor mollis class ultricies, senectus nulla eget ad magna ligula porttitor non donec.Lorem ipsum dolor sit amet consectetur adipiscing elit tempor mollis class ultricies, senectus nulla eget ad magna ligula porttitor non donec. </p>
        </div>
        <div class="col-lg-6 py-3 px-5">
          <form>
            <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="inputEmail4">Aplicar</label>
                    <input type="text" class="form-control  background-gray" placeholder="Nombre">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="inputEmail4" class="color-transparent">Apellido</label>
                    <input type="text" class="form-control background-gray" placeholder="Apellido">
                  </div>
                  <div class="form-group col-md-12">
                    <input type="email" class="form-control background-gray" id="inputEmail4" placeholder="Correo">
                  </div>
                </div>
                <div class="form-row align-items-center">
                  <div class="col-3 my-1">
                    <div class="custom-control custom-checkbox mr-sm-2">
                      <input type="checkbox" class="custom-control-input" id="customControlAutosizing">
                      <label class="custom-control-label cv-style" for="customControlAutosizing">CV</label>
                    </div>
                  </div>
                  <div class="col-3 my-1">
                    <button type="submit" class="btn btn-gray">SUBIR</button>
                  </div>
                  <div class="col-6 my-1">
                    <input type="url" class="form-control background-gray" placeholder="Portafolio">
                    <small id="passwordHelpBlock" class="form-text text-muted subtitle-url">
                          *Url Portafolio
                    </small>
                  </div>


                </div>
                <div class="col-12 d-flex justify-content-center align-items-center">
                  <button type="submit" class="btn btn-red">ENVIAR</button>
                </div>
          </form>

        </div>



      </div>
    </div>
  </section>
  <!-- Section | Bolsa de Trabajo Trainne 3-->
  <section id="home-doors" class="mb-4">
    <div class="container">
      <div class="row style-row">
        <div class="col-lg-6 py-3 px-5">
          <h2 class="title-form mb-4 mt-0">Trainne Diseño</h2>
          <p class="subtitle-red">Diseño Gráfico</p>
          <p class="subtitle-description p-22">Descripción <br>
        Lorem ipsum dolor sit amet consectetur adipiscing elit tempor mollis class ultricies, senectus nulla eget ad magna ligula porttitor non donec.Lorem ipsum dolor sit amet consectetur adipiscing elit tempor mollis class ultricies, senectus nulla eget ad magna ligula porttitor non donec. </p>
        </div>
        <div class="col-lg-6 py-3 px-5">
          <form>
            <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="inputEmail4">Aplicar</label>
                    <input type="text" class="form-control  background-gray" placeholder="Nombre">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="inputEmail4" class="color-transparent">Apellido</label>
                    <input type="text" class="form-control background-gray" placeholder="Apellido">
                  </div>
                  <div class="form-group col-md-12">
                    <input type="email" class="form-control background-gray" id="inputEmail4" placeholder="Correo">
                  </div>
                </div>
                <div class="form-row align-items-center">
                  <div class="col-3 my-1">
                    <div class="custom-control custom-checkbox mr-sm-2">
                      <input type="checkbox" class="custom-control-input" id="customControlAutosizing">
                      <label class="custom-control-label cv-style" for="customControlAutosizing">CV</label>
                    </div>
                  </div>
                  <div class="col-3 my-1">
                    <button type="submit" class="btn btn-gray">SUBIR</button>
                  </div>
                  <div class="col-6 my-1">
                    <input type="url" class="form-control background-gray" placeholder="Portafolio">
                    <small id="passwordHelpBlock" class="form-text text-muted subtitle-url">
                          *Url Portafolio
                    </small>
                  </div>


                </div>
                <div class="col-12 d-flex justify-content-center align-items-center">
                  <button type="submit" class="btn btn-red">ENVIAR</button>
                </div>
          </form>

        </div>



      </div>
    </div>
  </section>
  <!--hr -->
  <div class="container-fluid">
    <div class="row px-hr">
      <div class="col-1hr px-hrcol">
        <hr class="hr-gray">
      </div>
    </div>
  </div>

  <!-- Section | Bolsa de Trabajo Audiovisual -->
  <section class="home-doorsmb">
    <div class="container-fluid">
      <div class="row">
        <div class="col-8 col-lg-8 text-alignstitle px-3 d-flex align-items-end">
          <p class="publicidad-title mb-0 px-0"><img class="img-icon-publicidad" src="{{asset('img/conceptRight.svg')}}" alt="ConceptHaus">Audiovisual</p>
        </div>
        <div class="col-4 col-lg-4 text-aligns">
          <p>2 Vacantes</p>
        </div>

      </div>

    </div>

  </section>
  <!-- Section | Bolsa de Trabajo Trainne 1-->
  <section id="home-doors" class="mb-4">
    <div class="container">
      <div class="row style-row">
        <div class="col-lg-6 py-3 px-5">
          <h2 class="title-form mb-4 mt-0">Trainne Diseño</h2>
          <p class="subtitle-red">Diseño Gráfico</p>
          <p class="subtitle-description p-22">Descripción <br>
        Lorem ipsum dolor sit amet consectetur adipiscing elit tempor mollis class ultricies, senectus nulla eget ad magna ligula porttitor non donec.Lorem ipsum dolor sit amet consectetur adipiscing elit tempor mollis class ultricies, senectus nulla eget ad magna ligula porttitor non donec. </p>
        </div>
        <div class="col-lg-6 py-3 px-5">
          <form>
            <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="inputEmail4">Aplicar</label>
                    <input type="text" class="form-control  background-gray" placeholder="Nombre">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="inputEmail4" class="color-transparent">Apellido</label>
                    <input type="text" class="form-control background-gray" placeholder="Apellido">
                  </div>
                  <div class="form-group col-md-12">
                    <input type="email" class="form-control background-gray" id="inputEmail4" placeholder="Correo">
                  </div>
                </div>
                <div class="form-row align-items-center">
                  <div class="col-3 my-1">
                    <div class="custom-control custom-checkbox mr-sm-2">
                      <input type="checkbox" class="custom-control-input" id="customControlAutosizing">
                      <label class="custom-control-label cv-style" for="customControlAutosizing">CV</label>
                    </div>
                  </div>
                  <div class="col-3 my-1">
                    <button type="submit" class="btn btn-gray">SUBIR</button>
                  </div>
                  <div class="col-6 my-1">
                    <input type="url" class="form-control background-gray" placeholder="Portafolio">
                    <small id="passwordHelpBlock" class="form-text text-muted subtitle-url">
                          *Url Portafolio
                    </small>
                  </div>


                </div>
                <div class="col-12 d-flex justify-content-center align-items-center">
                  <button type="submit" class="btn btn-red">ENVIAR</button>
                </div>
          </form>

        </div>



      </div>
    </div>
  </section>
  <!-- Section | Bolsa de Trabajo Trainne 2-->
  <section id="home-doors" class="mb-4">
    <div class="container">
      <div class="row style-row">
        <div class="col-lg-6 py-3 px-5">
          <h2 class="title-form mb-4 mt-0">Trainne Diseño</h2>
          <p class="subtitle-red">Diseño Gráfico</p>
          <p class="subtitle-description p-22">Descripción <br>
        Lorem ipsum dolor sit amet consectetur adipiscing elit tempor mollis class ultricies, senectus nulla eget ad magna ligula porttitor non donec.Lorem ipsum dolor sit amet consectetur adipiscing elit tempor mollis class ultricies, senectus nulla eget ad magna ligula porttitor non donec. </p>
        </div>
        <div class="col-lg-6 py-3 px-5">
          <form>
            <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="inputEmail4">Aplicar</label>
                    <input type="text" class="form-control  background-gray" placeholder="Nombre">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="inputEmail4" class="color-transparent">Apellido</label>
                    <input type="text" class="form-control background-gray" placeholder="Apellido">
                  </div>
                  <div class="form-group col-md-12">
                    <input type="email" class="form-control background-gray" id="inputEmail4" placeholder="Correo">
                  </div>
                </div>
                <div class="form-row align-items-center">
                  <div class="col-3 my-1">
                    <div class="custom-control custom-checkbox mr-sm-2">
                      <input type="checkbox" class="custom-control-input" id="customControlAutosizing">
                      <label class="custom-control-label cv-style" for="customControlAutosizing">CV</label>
                    </div>
                  </div>
                  <div class="col-3 my-1">
                    <button type="submit" class="btn btn-gray">SUBIR</button>
                  </div>
                  <div class="col-6 my-1">
                    <input type="url" class="form-control background-gray" placeholder="Portafolio">
                    <small id="passwordHelpBlock" class="form-text text-muted subtitle-url">
                          *Url Portafolio
                    </small>
                  </div>


                </div>
                <div class="col-12 d-flex justify-content-center align-items-center">
                  <button type="submit" class="btn btn-red">ENVIAR</button>
                </div>
          </form>

        </div>



      </div>
    </div>
  </section>
  <!--hr -->
  <div class="container-fluid">
    <div class="row px-hr">
      <div class="col-1hr px-hrcol">
        <hr class="hr-gray">
      </div>
    </div>
  </div>
  <!-- Section | Bolsa de Trabajo Recursos Humanos -->
  <section class="home-doorsmb">
    <div class="container-fluid">
      <div class="row">
        <div class="col-8 col-lg-8 text-alignstitle px-3 d-flex align-items-end">
          <p class="publicidad-title mb-0 px-0"><img class="img-icon-publicidad" src="{{asset('img/conceptRight.svg')}}" alt="ConceptHaus">Recursos Humanos</p>
        </div>
        <div class="col-4 col-lg-4 text-aligns">
          <p>2 Vacantes</p>
        </div>

      </div>

    </div>

  </section>
  <!-- Section | Bolsa de Trabajo Trainne 1-->
  <section id="home-doors" class="mb-4">
    <div class="container">
      <div class="row style-row">
        <div class="col-lg-6 py-3 px-5">
          <h2 class="title-form mb-4 mt-0">Trainne Diseño</h2>
          <p class="subtitle-red">Diseño Gráfico</p>
          <p class="subtitle-description p-22">Descripción <br>
        Lorem ipsum dolor sit amet consectetur adipiscing elit tempor mollis class ultricies, senectus nulla eget ad magna ligula porttitor non donec.Lorem ipsum dolor sit amet consectetur adipiscing elit tempor mollis class ultricies, senectus nulla eget ad magna ligula porttitor non donec. </p>
        </div>
        <div class="col-lg-6 py-3 px-5">
          <form>
            <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="inputEmail4">Aplicar</label>
                    <input type="text" class="form-control  background-gray" placeholder="Nombre">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="inputEmail4" class="color-transparent">Apellido</label>
                    <input type="text" class="form-control background-gray" placeholder="Apellido">
                  </div>
                  <div class="form-group col-md-12">
                    <input type="email" class="form-control background-gray" id="inputEmail4" placeholder="Correo">
                  </div>
                </div>
                <div class="form-row align-items-center">
                  <div class="col-3 my-1">
                    <div class="custom-control custom-checkbox mr-sm-2">
                      <input type="checkbox" class="custom-control-input" id="customControlAutosizing">
                      <label class="custom-control-label cv-style" for="customControlAutosizing">CV</label>
                    </div>
                  </div>
                  <div class="col-3 my-1">
                    <button type="submit" class="btn btn-gray">SUBIR</button>
                  </div>
                  <div class="col-6 my-1">
                    <input type="url" class="form-control background-gray" placeholder="Portafolio">
                    <small id="passwordHelpBlock" class="form-text text-muted subtitle-url">
                          *Url Portafolio
                    </small>
                  </div>


                </div>
                <div class="col-12 d-flex justify-content-center align-items-center">
                  <button type="submit" class="btn btn-red">ENVIAR</button>
                </div>
          </form>

        </div>



      </div>
    </div>
  </section>
  <!-- Section | Bolsa de Trabajo Trainne 2-->
  <section id="home-doors" class="mb-4">
    <div class="container">
      <div class="row style-row">
        <div class="col-lg-6 py-3 px-5">
          <h2 class="title-form mb-4 mt-0">Trainne Diseño</h2>
          <p class="subtitle-red">Diseño Gráfico</p>
          <p class="subtitle-description p-22">Descripción <br>
        Lorem ipsum dolor sit amet consectetur adipiscing elit tempor mollis class ultricies, senectus nulla eget ad magna ligula porttitor non donec.Lorem ipsum dolor sit amet consectetur adipiscing elit tempor mollis class ultricies, senectus nulla eget ad magna ligula porttitor non donec. </p>
        </div>
        <div class="col-lg-6 py-3 px-5">
          <form>
            <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="inputEmail4">Aplicar</label>
                    <input type="text" class="form-control  background-gray" placeholder="Nombre">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="inputEmail4" class="color-transparent">Apellido</label>
                    <input type="text" class="form-control background-gray" placeholder="Apellido">
                  </div>
                  <div class="form-group col-md-12">
                    <input type="email" class="form-control background-gray" id="inputEmail4" placeholder="Correo">
                  </div>
                </div>
                <div class="form-row align-items-center">
                  <div class="col-3 my-1">
                    <div class="custom-control custom-checkbox mr-sm-2">
                      <input type="checkbox" class="custom-control-input" id="customControlAutosizing">
                      <label class="custom-control-label cv-style" for="customControlAutosizing">CV</label>
                    </div>
                  </div>
                  <div class="col-3 my-1">
                    <button type="submit" class="btn btn-gray">SUBIR</button>
                  </div>
                  <div class="col-6 my-1">
                    <input type="url" class="form-control background-gray" placeholder="Portafolio">
                    <small id="passwordHelpBlock" class="form-text text-muted subtitle-url">
                          *Url Portafolio
                    </small>
                  </div>


                </div>
                <div class="col-12 d-flex justify-content-center align-items-center">
                  <button type="submit" class="btn btn-red">ENVIAR</button>
                </div>
          </form>

        </div>



      </div>
    </div>
  </section>



</div>

@endsection
