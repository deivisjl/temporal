@extends('adminlte::page')

@section('title', 'Autorizaciones')
@section('plugins.Sweetalert2', true)

@section('content_header')
    <h1>Autorizar</h1>
@stop

@section('content')


<div class="row">
    <div class="md-form input-group mb-3">
        <input type="text" class="form-control col-8" placeholder="Ingrese el nombre del pendiente..." aria-label="Recipient's username"
          aria-describedby="MaterialButton-addon2">
        <div class="input-group-append">
          <button class="btn btn-md btn-info m-0 px-3" type="button" id="MaterialButton-addon2">Buscar</button>
        </div>

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
                    @if($pendiente->proceso=='SOLICITUD')
                    <form action="{{route('autorizaciones.store')}}" method="POST" class="formulario-reservar" >
                        @csrf
                        <input type="hidden" name="idpendiente" class="form-control"  value="{{$pendiente->id}}" >
                       <button type="submit"  class="btn btn btn-success btn-sm mr-2 " ><i class="far fa-edit mr-2"></i>Autorizar</button>
                </form>
                    @else
                     <button type="button" class="btn btn btn-danger btn-sm mr-2 " readonly ><i class="far fa-edit mr-2"></i>Reservado</button>
                    @endif

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
@if(session('mensaje')=='agregado')

    <script>
    Swal.fire(

                'Su pendiente ha sido enviado para Autorizacion.',
                'Satisfactoriamente!'
                )
            </script>
@elseif(session('mensaje')=='agregar')
<script>
    Swal.fire(

                'Registro Agregado.',
                'Satisfactoriamente!'
                )
            </script>
@endif
<script>



    $('.formulario-reservar').submit(function(e){



        e.preventDefault();
        Swal.fire({
                title: 'Deseas Prestar el pendiente: ?',
                text: "Ya no podra revertir el proceso!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, Borrarlo!'
                }).then((result) => {
                if (result.value) {
                  this.submit();
                }
                })
    });






</script>
@stop
