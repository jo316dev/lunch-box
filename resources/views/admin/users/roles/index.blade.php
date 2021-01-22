@extends('adminlte::page')

@section('title', 'Lunch - Perfis')

@section('content_header')
    <h1>Cargos Disponiveis</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            @include('admin.includes.alerts')
            <div class="row">
                <div class="col-md-6">
                    <h4 class="title"> Cargos de {{ $user->name }}</strong> </strong> </h4>
                </div>
                <div class="col-md-6">
                
        </div>
        <div class="card-body">


            <div class="card-body">
                <table class="table table-striped">
                  <thead>
                  <tr>
                    <th>Cargo</th>
                    <th>Ações</th>
                  </tr>
                  </thead>
                  <tbody>

                    @foreach ($user->roles as $role)
                        <tr>
                            <td>{{ $role->name }}</td>
                            <td>
                                
                                <a href="{{ route('users.roles.detach', [$user->id, $role->id]) }}" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
                            </td>
                        </tr>
                    @endforeach
                  
                  </tbody>
                </table>
              

        </div>
        <div class="card-footer">
          
            <div class="btn-group">
                <a href="{{ route('users.roles.available', $user->id) }}" class="btn btn-info">Vincular</a>
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