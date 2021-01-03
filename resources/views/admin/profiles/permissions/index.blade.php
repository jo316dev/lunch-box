@extends('adminlte::page')

@section('title', 'Lunch - Perfis')

@section('content_header')
    <h1>Perfis</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            @include('admin.includes.alerts')
            <div class="row">
                <div class="col-md-6">
                    <h4 class="title"> Permissões atribuidas a {{ $profile->name }}</strong> </strong> </h4>
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

                    @foreach ($permissions as $permission)
                        <tr>
                            <td>{{ $permission->name }}</td>
                            <td>
                                
                                   
                                  
                            </td>
                        </tr>
                    @endforeach
                  
                  </tbody>
                </table>
              

        </div>
        <div class="card-footer">
          
            <div class="btn-group">
                <a href="{{ route('profile.permissions.available', $profile->id) }}" class="btn btn-info">Vincular</a>
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