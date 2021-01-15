@extends('adminlte::page')

@section('title', 'Lunch - Editar Usuario')

@section('content_header')
    <h1>Produto: <strong>{{ $tenant->name }}</strong></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            @include('admin.includes.alerts')
        </div>
        <div class="card-body">

            <div class="row">
                <div class="col-12 col-sm-6">
                    <img src="{{ url("storage/$tenant->image") }}" alt="{{ $tenant->name }}" class="tenant-image"style="max-width:500px">
                 
                </div>

               

                <div class="col-12 col-sm-6">
                    <h3 class="my-3">{{ $tenant->name }}</h3>
                    <hr>
                    <p>Plano Assinado: <strong>{{ $tenant->plan->name }}</strong></p>
                    <p>CNPJ: <strong>{{ $tenant->cnpj }}</strong></p>
                    <p>Email: <strong>{{ $tenant->email }}</strong></p>
                    <p>Status: <strong>{{ $tenant->active == 'Y' ? 'Ativo' : 'Desativado' }}</strong></p>
                    <hr>
                    <h3>Dados da Assinatura</h3>
                    <hr>
                    <p>Data Assinatura: <strong>{{ date("d/m/Y", strtotime($tenant->subscription)) }}</strong></p>
                    <p>Data Expiração: <strong>{{ date("d/m/Y", strtotime($tenant->expires_at)) }}</strong></p>
                    
                   
                    

                </div>

            </div>
            
            
        
           
        </div>
        <div class="card-footer">
           
                <div class="btn-group">
                  
                    {{-- <a href="{{ route('details.tenant.index', $tenant->id) }}" class="btn btn-success">Ver detalhes</a> --}}
                    <a href="{{ route('tenants.edit', $tenant->id) }}" class="btn btn-warning ">Editar</a>
                
                
        
                    <form action="{{ route('tenants.destroy', $tenant->id) }}" method="POST">
                        @csrf
                       @method('DELETE')
                        <button class="submit btn btn-danger float-left">Deletar</button>    
                    </form>
                    
                
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