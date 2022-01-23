@extends('adminlte::page')


@section('title', 'Crear Objeto')


@section('content_header')
    <h1 class="text-center">Crear Nuevo Objeto</h1>
    <hr class="bg-dark border-1 border-top border-dark">
@stop

@section('content')
<form action="{{route('objetos.store')}}" method="post">
    @csrf <!-- Token secreto para validar el request -->
    
    <div class="row">
            <div class="col">
                <div class="form-group has-primary">
                    <label for="objeto">Nombre del Objeto:</label>
                    <input 
                        id="objeto" 
                        class="form-control border-dark" 
                        placeholder="Ingrese el nombre del objeto..." 
                        type="text" 
                        name="objeto"
                        :value="old('objeto')" 
                        autofocus>
                        
                    @if ($errors->has('objeto'))
                    <div 
                        id="objeto-error" 
                        class="error text-danger pl-3" 
                        for="objeto" 
                        style="display: bock;">
                        <strong>
                            {{$errors -> first('objeto')}}
                        </strong>
                    </div>
                    @endif

                </div>
            </div>   
    </div>
    <div class="row">
            <div class="col">
                <div class="form-group has-primary">
                    <label for="descripcion">Descripción del Objeto:</label>
                    <input 
                        id="descripcion" 
                        class="form-control border-dark" 
                        placeholder="Ingrese el nombre del descripcion..." 
                        type="text" 
                        name="descripcion"
                        :value="old('descripcion')" 
                        autofocus>
                        
                    @if ($errors->has('descripcion'))
                    <div 
                        id="descripcion-error" 
                        class="error text-danger pl-3" 
                        for="descripcion" 
                        style="display: bock;">
                        <strong>
                            {{$errors -> first('descripcion')}}
                        </strong>
                    </div>
                    @endif

                </div>
            </div>   
    </div>


    <div class="row">
        <div class="col-sm-6 col-xs-12 mb-2">
            <a  href="{{route('objetos.index')}}" 
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