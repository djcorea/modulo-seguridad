@extends('adminlte::page')

@section('title', 'Parametros')

@section('css')
<link href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css" rel="stylesheet">
@stop
@section('content_header')
    <h1 class="text-center">Parametros</h1>
    <hr class="bg-dark border-1 border-top border-dark">
@stop

@section('content')


<a  href="{{route('parametros.create')}}" 
    class="btn btn-outline-info text-center btn-block">
    <span class="mr-2">Crear Nuevo Parametro</span> <i class="fas fa-plus-square"></i>
</a>


@if (session('info'))
<div class="alert alert-success">
    <strong>
        {{session('info')}}
    </strong>
</div>
@endif

<div class="table-responsive-sm mt-5">
<table id="tablaR" class="table table-striped table-bordered table-condensed table-hover" cellspacing="0"
            cellpadding="0" width="100%">
            <thead class="thead-dark">
                <tr class="text-center">
                    <th scope="col" width="30"># </th>
                    <th>Parametro</th>
                    <th>Valor</th>
                    <th width="100">Opciones</th>
                </tr>

            </thead>
            <tbody>
                @php $i=1;@endphp
                <tr class="text-center">
                    <td>{{$i}}</td>
                    <td >USUARIO</td>
                
                    <td class="text-success"> ACTIVO</td>
                    <!-- <td class="text-danger">INACTIVO</td> -->
                    <td width="100">

                        <form action="{{route('parametros.destroy', 1)}}" method="POST">
                            <a href="{{route('parametros.edit', 1)}}"
                                class="btn btn-warning btn-sm fa fa-edit "></a>
                        </form>
                    </td>
                </tr>
                @php $i++;@endphp
              

            </tbody>
        </table>
</div>

@stop

@section('css')

@stop

@section('js')
<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>

<script src="https://cdn.datatables.net/buttons/1.7.0/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
<script>
    $(document).ready(function() {
        $('#tablaR').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
            },
            
            dom: '<"pt-2 row" <"col-xl mt-2"l><"col-xl text-center"B><"col-xl text-right mt-2 buscar"f>> <"row"rti<"col"><p>>',
            buttons: [

                {
                    extend: 'pdf',
                    className: 'btn btn-danger glyphicon glyphicon-duplicate',
                   
                }, 
                {
                    extend: 'print',
                    text: 'Imprimir',
                    className: 'btn btn-secondary glyphicon glyphicon-duplicate'
                },
                {
                    extend: 'excel',
                    className: 'btn btn-success glyphicon glyphicon-duplicate'
                }
            ]
        });
    });
</script>
</script>
@stop