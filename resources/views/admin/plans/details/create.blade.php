@extends('adminlte::page')

@section('title', 'Lunch - Cadastrar Plano')

@section('content_header')
    <h1>Adicionando detalhes a: <strong>{{ $plan->name }}</strong></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">

        </div>
        <div class="card-body">
            
            <form action="{{ route('details.plan.store', $plan->id) }}" method="post">

                @csrf

                @include('admin.plans.details._partials.form')
                

                <div class="form-group">
                   <button type="submit" class="btn btn-info">Enviar</button>
                </div>

            </form>

           
        </div>
        <div class="card-footer">
            <a href="" class="btn btn-warning float-left"><i class="fas fa-backspace "> Cancelar</i></a>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop