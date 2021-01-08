@extends('adminlte::page')

@section('title', 'Lunch - Editar Usuario')

@section('content_header')
    <h1>Exbindo <strong>{{ $user->name }}</strong></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            @include('admin.includes.alerts')
        </div>
        <div class="card-body">
            
            
           <label for="">Nome do Usuário</label>
           <h4>{{ $user->name }}</h4>
           <label for="">Email</label>
           <h4>{{ $user->email }}</h4>
           
        </div>
        <div class="card-footer">
           
                <div class="btn-group">
                  
                    {{-- <a href="{{ route('details.user.index', $user->id) }}" class="btn btn-success">Ver detalhes</a> --}}
                    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning ">Editar</a>
                
        
                    <form action="{{ route('users.destroy', $user->id) }}" method="POST">
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