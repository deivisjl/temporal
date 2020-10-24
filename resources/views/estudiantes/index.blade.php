@extends('adminlte::page')

@section('title', 'Estudiantes')
@section('plugins.Sweetalert2', true)

@section('content_header')
    <h1>Estudiantes</h1>
@stop

@section('content')


<div class="row">
    <div class="md-form input-group mb-3">
        <input type="text" class="form-control col-8" placeholder="Ingrese el nombre del Estudiante..." aria-label="Recipient's username"
          aria-describedby="MaterialButton-addon2">
        <div class="input-group-append">
          <button class="btn btn-md btn-info m-0 px-3" type="button" id="MaterialButton-addon2">Buscar</button>
        </div>
        <div>
            <a href="{{ url('estudiantes/crear') }}">  <button type="button" class="btn btn-outline-info ml-5" >Agregar Estudiante</button></a>
        </div>
      </div>
</div>

    <!--Table-->
<table class="table table-striped table-responsive-md btn-table">

    <!--Table head-->
    <thead>
      <tr class="table-info">
        <th>#</th>
        <th>Nombre</th>
        <th>Carrera</th>
        <th>Carnet</th>
        <th>Correo</th>
        <th>Fecha de Alta</th>
        <th>Opciones</th>
      </tr>
    </thead>
    <!--Table head-->

    <!--Table body-->
    <tbody>
        @foreach ($Estudiantes as $Estudiante)
        <tr >
            <th scope="row">{{$Estudiante->id}}</th>
            <td>{{$Estudiante->nombreEs}}</td>
            <td>{{$Estudiante->carrera}}</td>
            <td>{{$Estudiante->carnet}}</td>
            <td>{{$Estudiante->correo}}</td>
            <td>{{$Estudiante->created_at}}</td>
            <td class="d-flex justify-content-start">
                <div >
                    <a href="{{route('estudiantes.edit', $Estudiante->id)}}" > <button type="button" class="btn btn-warning btn-sm mr-2 " ><i class="far fa-edit mr-2"></i>Editar</button> </a>
                </div>
              <div >
                <form action="{{route('estudiantes.destroy',$Estudiante->id)}}" method="POST" class="formulario-eliminar" >
                    @csrf

                  <button type="submit" class="btn btn-danger btn-sm mr-2  "  > <i class="fas fa-trash-alt mr-2"></i>Eliminar</button>
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


@section('js')
@if(session('mensaje')=='eliminar')
    <script>
    Swal.fire(
            'Su registro ha sido Eliminado.',
            'Satisfactoriamente!')
            </script>
@elseif(session('mensaje')=='agregar')
<script>
    Swal.fire(
            'Registro Agregado.',
            'Satisfactoriamente!'
             )
            </script>
             @elseif(session('mensaje')=='actualizar')
             <script>
                 Swal.fire(
                         'Registro Actualizado.',
                         'Satisfactoriamente!'
                          )
                         </script>
@endif
<script>
    $('.formulario-eliminar').submit(function(e){
        e.preventDefault();
        Swal.fire({
                title: 'Esta Seguro?',
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

