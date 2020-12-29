@extends('adminlte::page')

@section('title', 'Lunch - Planos')

@section('content_header')
    <h1>Planos</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            
            <div class="row">
                <div class="col-md-6">
                    <h4 class="title"> <strong>Planos cadastradados</strong> </h4>
                </div>
                <div class="col-md-6">
                    <form action="{{ route('plans.search') }}" method="POST" class="form form-inline float-right">
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
                    <th>Nome Plano</th>
                    <th>Descrição</th>
                    <th>Preço</th>
                    <th>Ações</th>
                  </tr>
                  </thead>
                  <tbody>

                    @foreach ($plans as $plan)
                        <tr>
                            <td>{{ $plan->name }}</td>
                            <td>{{ $plan->description }}</td>
                            <td>R$ {{ number_format($plan->price, 2, '.', ',') }}</td>
                            <td>
                                
                                    <div class="btn-group">
                                        <a href="{{ route('plans.show', $plan->id) }}" class="btn btn-info">Ver</a>
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
                    <a href="{{ route('plans.create') }}" class="btn btn-info float-left"><i class="fas fa-plus "> Add Plano</i></a>
                </div>
                <div class="col-lg-6 float-right">

                    @if (isset($filters))

                        {!! $plans->appends($filters)->links() !!}
                        
                    @else
                        {!! $plans->links() !!}
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