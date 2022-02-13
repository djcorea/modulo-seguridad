@extends('adminlte::page')


@section('title', 'Crear Rol')


@section('content_header')
    <h1 class="text-center">Crear Nuevo Rol</h1>
    <hr class="bg-dark border-1 border-top border-dark">
@stop

@section('content')
<form action="{{route('roles.store')}}" method="post">
    @csrf <!-- Token secreto para validar el request -->
    
    <div class="row">
            <div class="col">
                <div class="form-group has-primary">
                    <label for="rol">Nombre del Rol:</label>
                    <input 
                        id="rol" 
                        class="form-control border-dark" 
                        placeholder="Ingrese el nombre del rol..." 
                        type="text" 
                        name="rol"
                        :value="old('rol')" 
                        autofocus>
                        
                    @if ($errors->has('rol'))
                    <div 
                        id="rol-error" 
                        class="error text-danger pl-3" 
                        for="rol" 
                        style="display: bock;">
                        <strong>
                            {{$errors -> first('rol')}}
                        </strong>
                    </div>
                    @endif

                </div>
            </div>   
    </div>
    <div class="row">
            <div class="col">
            <div class="table table-responsive">
                <table id="permisos" class="table table-striped table-condensed table-hover  table-bordered border-primary" cellspacing="0" cellpadding="0" width="100%">
                    <thead class="text-center">
                        <tr> 
                            <th colspan="5">Listado de Permisos</th>
                        </tr>
                        <tr> 
                            @if ($errors->has('permisos'))
                            <th colspan="5">
                                <div 
                                    id="permisos-error" 
                                    class="error text-danger pl-3" 
                                    for="permisos" 
                                    style="display: bock;">
                                    <strong>
                                        {{$errors -> first('permisos')}}
                                    </strong>
                                </div>
                            </th>
                            @endif
                        </tr>
                        <tr>
                            <th>Pantalla</th>
                            <th>Ver</th>
                            <th>Crear</th>
                            <th>Editar</th>
                            <th>Eliminar</th>
                        </tr>
                    </thead>

                    <tbody class="text-center">

                        @foreach ( $objetos as $objeto )
                        <tr>
                            <td>{{$objeto->objeto}}</td>
                            <td> <input type="checkbox" name="permisos[]" value="VER_{{$objeto->objeto}}" id=""></td>
                            <td> <input type="checkbox" name="permisos[]" value="INSERTAR_{{$objeto->objeto}}" id=""></td>
                            <td> <input type="checkbox" name="permisos[]" value="EDITAR_{{$objeto->objeto}}" id=""></td>
                            <td> <input type="checkbox" name="permisos[]" value="ELIMINAR_{{$objeto->objeto}}" id=""></td>

                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            </div>   
    </div>


    <div class="row">
        <div class="col-sm-6 col-xs-12 mb-2">
            <a  href="{{route('roles.index')}}" 
                class="btn btn-danger w-100"
            >Cancelar <i class="fa fa-times-circle ml-2"></i>
            </a>
        </div>

        <div class="col-sm-6 col-xs-12 mb-2">
            <button 
                type="submit" 
                class="btn btn-success w-100"
            >Guardar <i class="fas fa-check-circle ml-2"></i>
            </button>
        </div>
    </div>
    
    

</form>


@stop

@section('js')
@stop