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
        <th>Titulo</th>
        <th>Editorial</th>
        <th>Autor</th>
        <th>Stock</th>
        <th>Imagen</th>
        <th>Estado</th>
        <th>Opciones</th>
      </tr>
    </thead>
    <!--Table head-->

    <!--Table body-->
    <tbody>
        @foreach ($libros as $libro)
        <tr >
            <th scope="row">{{$libro->id}}</th>
            <td >{{$libro->titulo}}</td>
            <td>{{$libro->editorial}}</td>
            <td>{{$libro->autor}}</td>
            <td>{{$libro->stock}}</td>
            <td> <img src="{{asset('/img/libros/'.$libro->imagenLibro.'')}}" width="65px" height="65px"> </td>
            <td>{{$libro->estado}}</td>
            <td class="d-flex justify-content-start">
                <div >


                    @if($libro->estado=='disponible')
                    <form action="{{route('reservaciones.store')}}" method="POST" class="formulario-reservar" >
                        @csrf
                        <input type="hidden" name="idlibro" class="form-control"  value="{{$libro->id}}" >
                     <button type="submit"  class="btn btn btn-success btn-sm mr-2 " ><i class="far fa-edit mr-2"></i>Reservar</button>
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

                'Su Libro ha sido enviado para Autorizacion.',
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
                title: 'Deseas Prestar el Libro: ?',
                text: "Ya no podra revertir el proceso!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, Reservarlo!'
                }).then((result) => {
                if (result.value) {
                  this.submit();
                }
                })
    });






</script>
@stop
