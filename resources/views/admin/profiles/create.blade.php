@extends('adminlte::page')

@section('title', 'Lunch - Cadastrar Perfil')

@section('content_header')
    <h1>Criar Novo Perfil</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">

        </div>
        <div class="card-body">
            
            <form action="{{ route('profiles.store') }}" method="post">

                @csrf

                @include('admin.profiles._partials.form')
                

                <div class="form-group">
                   <button type="submit" class="btn btn-info">Enviar</button>
                </div>

            </form>

           
        </div>
        <div class="card-footer">
            <a href="{{ route('profiles.index') }}" class="btn btn-warning float-left"><i class="fas fa-backspace "> </i> Cancelar</a>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop