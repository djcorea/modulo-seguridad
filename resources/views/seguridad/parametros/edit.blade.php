@extends('adminlte::page')


@section('title', 'Editar parametro')


@section('content_header')
    <h1 class="text-center">Editar Parametro</h1>
    <hr class="bg-dark border-1 border-top border-dark">
@stop

@section('content')
<form action="{{route('parametros.update',$parametro->id)}}" method="post">
    @csrf <!-- Token secreto para validar el request -->
    @method('PUT')
    <div class="row">
            <div class="col-sm-6 col-xs-12">
                <div class="form-group has-primary">
                <label for="parametro">Parametro:</label>
                    <input 
                        id="parametro" 
                        class="form-control border-dark" 
                        placeholder="Ingrese el nombre del parametro..." 
                        type="text" 
                        name="parametro"
                        value="{{$parametro->parametro}}"
                        autofocus>
                    @if ($errors->has('parametro'))
                    <div id="parametro-error" class="error text-danger pl-3" for="parametro" style="display: bock;">
                        <strong>
                            {{$errors -> first('parametro')}}
                        </strong>
                    </div>
                    @endif

                </div>
            </div>
            
            <div class="col-sm-6 col-xs-12">
                <div class="form-group has-primary">
                
                    
                    <label for="valor">Valor:</label>
                    <input 
                        id="valor" 
                        class="form-control"  
                        placeholder="Ingrese el valor..." 
                        type="text" 
                        name="valor" 
                        value="{{$parametro->valor}}">
                 
                    @if ($errors->has('valor'))
                    <div id="valor-error" class="error text-danger pl-3" for="valor" style="display: bock;">
                        <strong>
                            {{$errors -> first('valor')}}
                        </strong>
                    </div>
                    @endif

                </div>
            </div>
    </div>


    <div class="row">
        <div class="col-sm-6 col-xs-12 mb-2">
            <a  href="{{route('parametros.index')}}" 
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