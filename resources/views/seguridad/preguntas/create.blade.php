@extends('adminlte::page')


@section('title', 'Crear Pregunta')


@section('content_header')
    <h1 class="text-center">Crear Nueva Pregunta</h1>
    <hr class="bg-dark border-1 border-top border-dark">
@stop

@section('content')
<form action="{{route('preguntas.store')}}" method="post">
    @csrf <!-- Token secreto para validar el request -->
    
    <div class="row">
            <div class="col-sm-12 col-xs-12">
                <div class="form-group has-primary">
                    <label for="pregunta">Pregunta:</label>
                    <input 
                        id="pregunta" 
                        class="form-control border-dark" 
                        placeholder="Ingrese la pregunta..." 
                        type="text" 
                        name="pregunta"
                        :value="old('pregunta')" 
                        autofocus>
                        
                    @if ($errors->has('pregunta'))
                    <div 
                        id="pregunta-error" 
                        class="error text-danger pl-3" 
                        for="pregunta" 
                        style="display: bock;">
                        <strong>
                            {{$errors -> first('pregunta')}}
                        </strong>
                    </div>
                    @endif

                </div>
            </div>
    </div>


    <div class="row">
        <div class="col-sm-6 col-xs-12 mb-2">
            <a  href="{{route('preguntas.index')}}" 
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