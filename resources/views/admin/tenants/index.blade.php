@extends('adminlte::page')

@section('title', 'Lunch - Produtos')

@section('content_header')
    <h1>Empresas Cadastradas</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            
            <div class="row">
                <div class="col-md-6">
                    <h4 class="title"> <strong>Empresas Cadastradas</strong> </h4>
                </div>
                {{-- <div class="col-md-6">
                    <form action="{{ route('tenants.search') }}" method="POST" class="form form-inline float-right">
                        @csrf
                        
                        <input type="text" name="filter" class="text form-control" placeholder="Digite um termo">
        
                        <button class="submit btn btn-primary"><i class="fas fa-search"></i> Pesquisar</button>
                </div> --}}
            </div>

            </form>
        </div>
        <div class="card-body">


            <div class="card-body p-0">
                <table class="table table-striped table-valign-middle">
                  <thead>
                  <tr>
                    <th>Logo</th>
                    <th>Nome</th>
                    <th>Ações</th>
                  </tr>
                  </thead>
                  <tbody>

                    @foreach ($tenants as $tenant)
                        <tr>
                            <td>
                                <img src="{{ url("storage/{$tenant->image}") }}" alt="{{ $tenant->uuid }}" style="max-width:150px">
                            </td>
                           
                            <td>{{ $tenant->name }}</td>
                           
                            
                            <td>
                                
                                    <div class="btn-group">
                                        <a href="{{ route('tenants.show', $tenant->id) }}" class="btn btn-info">Ver</a>
                                    
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
                    <a href="{{ route('tenants.create') }}" class="btn btn-info float-left"><i class="fas fa-plus "></i>Cadastrar Empresas</a>
                </div>
                <div class="col-lg-6 float-right">

                    @if (isset($filters))

                        {!! $tenants->appends($filters)->links() !!}
                        
                    @else
                        {!! $tenants->links() !!}
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