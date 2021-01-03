@extends('adminlte::page')

@section('title', 'Lunch - Permissões')

@section('content_header')
    <h1>Exbindo <strong>{{ $permission->name }}</strong></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            @include('admin.includes.alerts')
        </div>
        <div class="card-body">
            
            
           <label for="">Titulo</label>
           <h4>{{ $permission->name }}</h4>
           <label for="">Descrição</label>
           <h4>{{ $permission->description }}</h4>
         
           
        </div>
        <div class="card-footer">
            <div class="row">
                <div class="btn-group">
                  
                   
                    <a href="{{ route('permissions.edit', $permission->id) }}" class="btn btn-warning ">Editar</a>
                
        
                <div class="col-10">
                    <form action="{{ route('permissions.destroy', $permission->id) }}" method="POST">
                        @csrf
                       @method('DELETE')
                        <button class="submit btn btn-danger float-left">Deletar</button>    
                    </form>
                    
                </div>

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