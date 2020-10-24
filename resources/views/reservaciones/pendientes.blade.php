@extends('adminlte::page')

@section('title', 'Reservaciones')
@section('plugins.Sweetalert2', true)

@section('content_header')
    <h1>Reservaciones</h1>
@stop

@section('content')


<div class="row">
    <div class="md-form input-group mb-3">

      </div>
</div>

    <!--Table-->
<table class="table table-striped table-responsive-md btn-table">

    <!--Table head-->
    <thead>
      <tr class="table-info">
        <th>#</th>
        <th>Estudiante</th>
        <th>Libro</th>
        <th>Estado</th>

        <th>Fecha de Prestamo</th>
        <th>Opciones</th>
      </tr>
    </thead>
    <!--Table head-->

    <!--Table body-->
    <tbody>
        @foreach ($pendientes as $pendiente)
        <tr >
            <th scope="row">{{$pendiente->id}}</th>
            <td>{{$pendiente->find($pendiente->id)->estudiante->nombreEs}}</td>
            <td>{{$pendiente->find($pendiente->id)->libro->titulo}}</td>
            <td >{{$pendiente->proceso}}</td>
            <td >{{$pendiente->created_at}}</td>



            <td class="d-flex justify-content-start">
                <div >

                    <form action="{{route('reservaciones.autorizacion')}}" method="POST" class="formulario-reservar" >
                        @csrf
                        <input type="hidden" name="idpendiente" class="form-control"  value="{{$pendiente->id}}" >
                    @if($pendiente->proceso=='SOLICITUD')
                        <input type="hidden" name="accion" class="form-control"  value="" >
                       <button type="submit"  class="btn btn btn-success btn-sm mr-2 " ><i class="far fa-edit mr-2"></i>Autorizar</button>
                    @elseif($pendiente->proceso=='DEVUELTO')

                    <button  class="btn btn btn-primary btn-sm mr-2 " > <i class="far fa-edit mr-2"></i>Libro Devuelto</button>
                    @else
                    <input type="hidden" name="accion" class="form-control"  value="devolver" >
                    <button type="submit"  class="btn btn btn-warning btn-sm mr-2 " ><i class="far fa-edit mr-2"></i>Devolver</button>
                    @endif
                </form>

                </div>







            </td>
          </tr>
        @endforeach


    </tbody>
    <!--Table body-->


  </table>
  <!--Table-->
</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
@if(session('mensaje')=='devuelto')

    <script>
    Swal.fire(

                'Libro Devuelto.',
                'Satisfactoriamente!'
                )
            </script>
@elseif(session('mensaje')=='autorizado')
<script>
    Swal.fire(

                'Registro Autorizado.',
                'Correctamente!'
                )
            </script>
@endif
<script>



    $('.formulario-reservar').submit(function(e){



        e.preventDefault();
        Swal.fire({
                title: 'Deseas continuar ?',
                text: "Ya no podra revertir el proceso!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, Autorizar!'
                }).then((result) => {
                if (result.value) {
                  this.submit();
                }
                })
    });






</script>
@stop
