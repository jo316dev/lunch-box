@extends('adminlte::page')

@section('title', 'Lunch - Perfis')

@section('content_header')
    <h1>Cargos</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            @include('admin.includes.alerts')
            <div class="row">
                <div class="col-md-6">
                    <h4 class="title"> <strong>Cargos Cadastrados</strong> </h4>
                </div>
                <div class="col-md-6">
                    <form action="" method="POST" class="form form-inline float-right">
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
                    <th>Perfil</th>
                    <th>Descrição</th>
                    <th>Ações</th>
                  </tr>
                  </thead>
                  <tbody>

                    @foreach ($roles as $role)
                        <tr>
                            <td>{{ $role->name }}</td>
                            <td>{{ $role->description }}</td>
                            <td>
                                
                                    <div class="btn-group">
                                        <a href="{{ route('roles.show', $role->id) }}" class="btn btn-info">Visualizar</a>
                                        <a href="{{ route('roles.permissions', $role->id) }}" class="btn btn-primary"> <i class="fas fa-lock"></i> </a>
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
                    <a href="{{ route('roles.create') }}" class="btn btn-info float-left"><i class="fas fa-plus "></i>Cadastrar Cargo</a>
                </div>
                <div class="col-lg-6 float-right">

                    @if (isset($filters))

                        {!! $roles->appends($filters)->links() !!}
                        
                    @else
                        {!! $roles->links() !!}
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