@extends('adminlte::page')

@section('title', 'Lunch - Editar Plano')

@section('content_header')
    <h1>Editar Detalhes</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <h3>{{ $plan->name }} - {{ $detail->name }}</h3>
        </div>
        <div class="card-body">
            
            <form action="{{ route('details.plan.update', [$plan->id, $detail->id]) }}" method="post">

                @csrf
                @method('PUT')


                @include('admin.plans.details._partials.form')
                

                <div class="form-group">
                   <button type="submit" class="btn btn-info">Enviar</button>
                </div>

            </form>

           
        </div>
        <div class="card-footer">
            <a href="{{ route('plans.index') }}" class="btn btn-warning float-left"><i class="fas fa-backspace "> Cancelar</i></a>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop