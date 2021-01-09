@extends('adminlte::page')

@section('title', 'Lunch - Usuarios')

@section('content_header')
    <h1>Categorias</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            
            <div class="row">
                <div class="col-md-6">
                    <h4 class="title"> <strong>Categorias Cadastradas</strong> </h4>
                </div>
                <div class="col-md-6">
                    <form action="{{ route('categories.search') }}" method="POST" class="form form-inline float-right">
                        @csrf
                        
                        <input type="text" name="filter" class="text form-control" placeholder="Digite um termo">
        
                        <button class="submit btn btn-primary"><i class="fas fa-search"></i> Pesquisar</button>
                </div>
            </div>

            </form>
        </div>
        <div class="card-body">


            <div class="card-body p-0">
                <table class="table table-striped table-valign-middle">
                  <thead>
                  <tr>
                    <th>Nome</th>
                    <th>Descrição</th>
                    <th>Ações</th>
                  </tr>
                  </thead>
                  <tbody>

                    @foreach ($categories as $category)
                        <tr>
                            <td>{{ $category->name }}</td>
                            <td>{{ $category->description }}</td>
                            
                            <td>
                                
                                    <div class="btn-group">
                                        <a href="{{ route('categories.show', $category->id) }}" class="btn btn-info">Ver</a>
                                        
                                    </div>
                                   
                                  
                            </td>
                        </tr>
                    @endforeach
                  
                  </tbody>
                </table>
              </div>

        </div>
        <div class="card-footer">
            <div class="row">
                <div class="col-lg-6">
                    <a href="{{ route('categories.create') }}" class="btn btn-info float-left"><i class="fas fa-plus ">Cadastrar Categorias</i></a>
                </div>
                <div class="col-lg-6 float-right">

                    @if (isset($filters))

                        {!! $categories->appends($filters)->links() !!}
                        
                    @else
                        {!! $categories->links() !!}
                    @endif
                    
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