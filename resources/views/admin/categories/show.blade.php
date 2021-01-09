@extends('adminlte::page')

@section('title', 'Lunch - Editar Usuario')

@section('content_header')
    <h1>Categoria: <strong>{{ $category->name }}</strong></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            @include('admin.includes.alerts')
        </div>
        <div class="card-body">
            
            
           <label for="">Titulo</label>
           <h4>{{ $category->name }}</h4>
           <label for="">Descrição</label>
           <h4>{{ $category->description }}</h4>
           
        </div>
        <div class="card-footer">
           
                <div class="btn-group">
                  
                    {{-- <a href="{{ route('details.category.index', $category->id) }}" class="btn btn-success">Ver detalhes</a> --}}
                    <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-warning ">Editar</a>
                
        
                    <form action="{{ route('categories.destroy', $category->id) }}" method="POST">
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