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
                    <h4 class="title"> Cargos disponiveis para: <strong>{{ $user->name }}</strong> </h4>
                </div>
                <div class="col-md-6">
                
        </div>
        <div class="card-body">


            <div class="card-body">
                <table class="table table-striped">
                  <thead>
                  <tr>
                    <th width="50px">Check</th>
                    <th>Cargos</th>
                  </tr>
                  </thead>
                  <tbody>

                   <form action="{{ route('users.roles.attach', $user->id) }}" method="post">
                       @csrf

                       @foreach ($roles as $role)
                       <tr>
                        <tr>
                            <td>
                                <div class="checkbox">
                                    <label for="">
                                        <input type="checkbox" name="roles[]" value="{{ $role->id }}">
                                    </label>
                                </div>
                            </td>
                        
                           <td>{{ $role->name }}</td>

                           
                       </tr>
                   @endforeach
                    <td colspan="500">
                            <button class="submit btn btn-success">Vincular</button>
                    </td>
                   </form>
                  
                  </tbody>
                </table>
              

        </div>
        <div class="card-footer">
          
        
              
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop