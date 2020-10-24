
    @extends('adminlte::page')

    @section('title', 'Dashboard')

    @section('plugins.Sweetalert2')

    @section('content_header')


        {{--   <li><a href="#services" data-after="Service">Services</a></li>
          <li><a href="#projects" data-after="Projects">Projects</a></li>
          <li><a href="#about" data-after="About">About</a></li>
          <li><a href="#contact" data-after="Contact">Contact</a></li> --}}

    @stop

    @section('content')
        <div class="container">
            <div class="card-deck">
                <div class="card">
                    <div class="card-header bg-success"><h2 >Control de Libros</h2></div>
                  <img class="card-img-top img-responsive"   src="{{asset('img/book.png')}}" alt="Card image cap">
                  <div class="card-body">

                    <p class="card-text">Una de las funciones de la Aplicacion es el control de Libros, puede Agregar, Editar, Listar, Actualizar y Borrar Libros.</p>
                  </div>
                  <div class="card-footer">
                    <small class="text-muted">Biblioteca App 2020</small>
                  </div>
                </div>
                <div class="card">
                    <div class="card-header bg-warning"><h2 >Control de Estudiantes</h2></div>
                  <img class="card-img-top img-responsive"  src="{{asset('img/student.png')}}" alt="Card image cap">
                  <div class="card-body">

                    <p class="card-text">Funcion que servira para llevar el Control de estudiantes, Agregar, Listar, Actualizar y borrar.</p>
                  </div>
                  <div class="card-footer">
                    <small class="text-muted">Biblioteca App 2020</small>
                  </div>
                </div>
                <div class="card">
                    <div class="card-header bg-danger"><h2 >Reportes</h2></div>
                  <img class="card-img-top img-responsive"  src="{{asset('img/report.png')}}" alt="Card image cap">

                  <div class="card-body">

                    <p class="card-text">Reportes de Libros en Reserva, Entregados, y en Stock dentro de la Biblioteca.</p>
                  </div>
                  <div class="card-footer">
                    <small class="text-muted">Biblioteca App 2020</small>
                  </div>
                </div>
              </div>

            </div>


        </div>
    @stop

    {{-- @section('css')
        <link rel="stylesheet" href="/css/admin_custom.css">
    @stop --}}

    @section('js')
        <script>

        Swal.fire(
           'Bienvenido '
          )
          </script>
    @stop
