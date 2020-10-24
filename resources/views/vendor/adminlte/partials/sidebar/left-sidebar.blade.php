<aside class="main-sidebar {{ config('adminlte.classes_sidebar', 'sidebar-dark-primary elevation-4') }}">

    {{-- Sidebar brand logo --}}
    @if(config('adminlte.logo_img_xl'))
        @include('adminlte::partials.common.brand-logo-xl')
    @else
        @include('adminlte::partials.common.brand-logo-xs')
    @endif

    {{-- Sidebar menu --}}
    <div class="sidebar">
        <nav class="mt-2">

         @if(Auth::user()->hasRole('admin'))
         <ul class="nav nav-pills nav-sidebar flex-column" >
                <a href="{{route('libros.index')}}" class="nav-link"><i class="fas fa-book"> Libros</i></a>
                <a href="{{route('estudiantes.index')}}" class="nav-link" > <i class="fas fa-user-graduate"> Estudiantes</i></a>
                <a href="{{route('secretarias.index')}}" class="nav-link"> <i class="fas fa-female"> Secretarias</i></a>
                <a href="{{route('reservaciones.index')}}" class="nav-link"> <i class="fas fa-female"> Reservaciones de libros</i></a>
                <a href="{{route('reservaciones.pendientes')}}" class="nav-link"> <i class="fas fa-female"> Pendientes</i></a>




                    <a href="{{route('libros.index')}}" class="nav-link"><i class="fas fa-book"> Secretaria</i></a>
                </ul>

                <ul class="nav nav-pills nav-sidebar flex-column" >
                    <a href="{{route('reportes.reporte')}}" class="nav-link"><i class="fas fa-book"> Reporte</i></a>
                </ul>
                @elseif(Auth::user()->hasRole('secretaria'))

         @elseif(Auth::user()->hasRole('estudiante'))
         <a href="{{route('libros.index')}}" class="nav-link"><i class="fas fa-book"> Estudiantes</i></a>

         {{--    <ul class="nav nav-pills nav-sidebar flex-column {{ config('adminlte.classes_sidebar_nav', '') }}"
                data-widget="treeview" role="menu"
                @if(config('adminlte.sidebar_nav_animation_speed') != 300)
                    data-animation-speed="{{ config('adminlte.sidebar_nav_animation_speed') }}"
                @endif
                @if(!config('adminlte.sidebar_nav_accordion'))
                    data-accordion="false"
                @endif>
                {{-- Configured sidebar links
                @each('adminlte::partials.sidebar.menu-item', $adminlte->menu('sidebar'), 'item')
            </ul> --}}
         @endif
        </ul>
        </nav>
    </div>

</aside>
