


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
    <h1>Prestamos de Libros</h1>
    <div id="container"></div>
    @stop

    @section('js')
<script src="https://code.highcharts.com/highcharts.js"></script>

<script type="text/javascript">
    var userData = @json($cantidad,JSON_PRETTY_PRINT);

    Highcharts.chart('container', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: 'Libros Prestados'
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    accessibility: {
        point: {
            valueSuffix: '%'
        }
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                enabled: true,
                format: '<b>{point.name}</b>: {point.percentage:.1f} %'
            }
        }
    },

    series: [{
        name: 'Libros',
        colorByPoint: true,
        data: @json($cantidad,JSON_PRETTY_PRINT)
    }]


});


</script>
@stop
