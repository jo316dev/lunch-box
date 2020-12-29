@extends('adminlte::page')

@section('title', 'Lunch - Editar Plano')

@section('content_header')
    <h1>Exbindo <strong>{{ $plan->name }}</strong></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            @include('admin.includes.alerts')
        </div>
        <div class="card-body">
            
            
           <label for="">Nome do Plano</label>
           <h4>{{ $plan->name }}</h4>
           <label for="">Descrição</label>
           <h4>{{ $plan->description }}</h4>
           <label for="">Valor</label>
           <h4>R$ {{ number_format($plan->price, 2, '.', ',') }}</h4>
           <label for="">URL utilizada</label>
           <h4>{{ $plan->url }}</h4>
           
        </div>
        <div class="card-footer">
            <div class="row">
                <div class="col-2">
                  
                    <a href="{{ route('details.plan.index', $plan->id) }}" class="btn btn-success">Ver detalhes</a>
                    <a href="{{ route('plans.edit', $plan->id) }}" class="btn btn-warning ">Editar</a>
                </div>
        
                <div class="col-10">
                    <form action="{{ route('plans.destroy', $plan->id) }}" method="POST">
                        @csrf
                       @method('DELETE')
                        <button class="submit btn btn-danger float-left">Deletar</button>    
                    </form>
                    
                </div>

            </div>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop