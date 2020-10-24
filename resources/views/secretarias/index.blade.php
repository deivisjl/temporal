@extends('adminlte::page')

@section('title', 'Secretarias')
@section('plugins.Sweetalert2', true)

@section('content_header')
    <h1>Secretarias</h1>
@stop

@section('content')


<div class="row">
    <div class="md-form input-group mb-3">
        <input type="text" class="form-control col-8" placeholder="Ingrese el nombre del secretaria..." aria-label="Recipient's username"
          aria-describedby="MaterialButton-addon2">
        <div class="input-group-append">
          <button class="btn btn-md btn-info m-0 px-3" type="button" id="MaterialButton-addon2">Buscar</button>
        </div>
        <div>
            <a href="{{ url('secretarias/crear') }}">  <button type="button" class="btn btn-outline-info ml-5" >Agregar secretaria</button></a>
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
        <th>Email</th>
        <th>Telefono</th>
        <th>Fecha de Nacimiento</th>
        <th>Fecha de Alta</th>
        <th>Opciones</th>
      </tr>
    </thead>
    <!--Table head-->

    <!--Table body-->
    <tbody>
        @foreach ($secretarias as $secretaria)
        <tr >
            <th scope="row">{{$secretaria->id}}</th>
            <td>{{$secretaria->nombreSe}}</td>
            <td>{{$secretaria->correo}}</td>
            <td>{{$secretaria->telefono}}</td>
            <td>{{$secretaria->fechaNac}}</td>
            <td>{{$secretaria->created_at}}</td>
            <td class="d-flex justify-content-start">
                <div >
                    <a href="{{route('secretarias.edit', $secretaria->id)}}" > <button type="button" class="btn btn-warning btn-sm mr-2 " ><i class="far fa-edit mr-2"></i>Editar</button> </a>
                </div>
              <div >
                <form action="{{route('secretarias.destroy',$secretaria->id)}}" method="POST" class="formulario-eliminar" >
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

