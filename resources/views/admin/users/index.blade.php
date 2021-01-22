@extends('adminlte::page')

@section('title', 'Lunch - Usuarios')

@section('content_header')
    <h1>Usuarios Do Sistema</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            
            <div class="row">
                <div class="col-md-6">
                    <h4 class="title"> <strong>Usuarios cadastradados</strong> </h4>
                </div>
                <div class="col-md-6">
                    <form action="{{ route('users.search') }}" method="POST" class="form form-inline float-right">
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
                    <th>Email</th>
                    <th>Ações</th>
                  </tr>
                  </thead>
                  <tbody>

                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            
                            <td>
                                
                                    <div class="btn-group">
                                        <a href="{{ route('users.show', $user->id) }}" class="btn btn-info">Ver</a>
                                        <a href="{{ route('users.roles', $user->id) }}" class="btn btn-success">Cargos</a>
                                        
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
                    <a href="{{ route('users.create') }}" class="btn btn-info float-left"><i class="fas fa-plus ">Cadastrar Usuário</i></a>
                </div>
                <div class="col-lg-6 float-right">

                    @if (isset($filters))

                        {!! $users->appends($filters)->links() !!}
                        
                    @else
                        {!! $users->links() !!}
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