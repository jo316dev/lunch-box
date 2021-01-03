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
                    <h4 class="title"> Perfis disponiveis para: <strong>{{ $plan->name }}</strong> </h4>
                </div>
                <div class="col-md-6">
                
        </div>
        <div class="card-body">


            @if (!count($profiles))

                <h4>Não existem perfis para serem cadastrados</h4>
                
                
            @else
            <table class="table table-striped">
                <thead>
                <tr>
                  <th width="50px">Check</th>
                  <th>Ações</th>
                </tr>
                </thead>
                <tbody>

                 <form action="{{ route('plan.profiles.attach', $plan->id) }}" method="post">
                     @csrf

                     @foreach ($profiles as $profile)
                     <tr>
                      <tr>
                          <td>
                              <div class="checkbox">
                                  <label for="">
                                      <input type="checkbox" name="profiles[]" value="{{ $profile->id }}">
                                  </label>
                              </div>
                          </td>
                      
                         <td>{{ $profile->name }}</td>
                        
                     </tr>
                 @endforeach
                  <td colspan="500">
                          <button class="submit btn btn-success">Vincular</button>
                  </td>
                 </form>
                
                </tbody>
              </table>
            @endif
                
              

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