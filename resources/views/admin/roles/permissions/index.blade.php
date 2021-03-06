@extends('adminlte::page')

@section('title', 'Lunch - Perfis')

@section('content_header')
    <h1>Permissões</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            @include('admin.includes.alerts')
            <div class="row">
                <div class="col-md-6">
                    <h4 class="title"> Permissões atribuidas a {{ $role->name }}</strong> </strong> </h4>
                </div>
                <div class="col-md-6">
                
        </div>
        <div class="card-body">


            <div class="card-body">
                <table class="table table-striped">
                  <thead>
                  <tr>
                    <th>Permissão</th>
                    <th>Ações</th>
                  </tr>
                  </thead>
                  <tbody>

                    @foreach ($role->permissions as $permission)
                        <tr>
                            <td>{{ $permission->name }}</td>
                            <td>
                                
                                <a href="{{ route('roles.permissions.detach', [$role->id, $permission->id]) }}" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
                            </td>
                        </tr>
                    @endforeach
                  
                  </tbody>
                </table>
              

        </div>
        <div class="card-footer">
          
            <div class="btn-group">
                <a href="{{ route('roles.permissions.available', $role->id) }}" class="btn btn-info">Vincular</a>
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