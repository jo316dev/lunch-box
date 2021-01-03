@extends('adminlte::page')

@section('title', 'Lunch - Perfis')

@section('content_header')
    <h1>Perfis atribuidos</strong> </h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            @include('admin.includes.alerts')
            <div class="row">
                <div class="col-md-6">
                    <h4 class="title"> Perfis atribuidos a <strong>{{ $plan->name }}</strong> </h4>
                </div>
                <div class="col-md-6">
                
        </div>
        <div class="card-body">


            <div class="card-body">
                <table class="table table-striped">
                  <thead>
                  <tr>
                    <th>Perfis</th>
                    <th>Ações</th>
                  </tr>
                  </thead>
                  <tbody>

                    @foreach ($profiles as $profile)
                        <tr>
                            <td>{{ $profile->name }}</td>
                            <td>
                                 <a href="{{ route('plan.profiles.detach', [$plan->id, $profile->id]) }}" class="btn btn-danger">Remover</a>
                            </td>
                        </tr>
                    @endforeach
                  
                  </tbody>
                </table>
              

        </div>
        <div class="card-footer">
          
            <div class="btn-group">
                <a href="{{ route('plan.profiles.available', $plan->id) }}" class="btn btn-info">Vincular Perfis</a>
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