@extends('adminlte::page')

@section('title', 'Lunch - Planos')

@section('content_header')
    <h1>Detalhes de: {{ $plan->name }}</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            
            <div class="row">
                <div class="col-md-6">
                    <h4 class="title"> <strong>Detalhes Cadastradados em {{ $plan->name }}</strong> </h4>
                </div>

                <div class="col-md-6">
                    <form action="{{ route('details.plan.search', $plan->id) }}" method="POST" class="form form-inline float-right">
                        @csrf
                        
                        <input type="text" name="filter" class="text form-control" placeholder="Digite um termo">
        
                        <button class="submit btn btn-primary"><i class="fas fa-search"></i> Pesquisar</button>
                </div>
             
            </div>

            </form>
        </div>
        <div class="card-body">


            <div class="card-body p-0">
                
                @if (!$details->count() == 0)
                <table class="table table-striped table-valign-middle">
                    <thead>
                    <tr>
                      <th>Descrição</th>
                      <th>Ações</th>
                    </tr>
                    </thead>
                    <tbody>
  
                      @foreach ($details as $detail)
                          <tr>
                              <td>{{ $detail->name }}</td>
                              <td>
                                  
                                      <div class="btn-group">
                                          <a href="{{ route('details.plan.edit', [$plan->id, $detail->id]) }}" class="btn btn-warning">Editar</a>
                                          <form action="{{ route('details.plan.destroy', [$plan->id, $detail->id]) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class="submit btn btn-danger">Excluir</button>
                                        </form>
                                      </div>
                                    
                              </td>
                          </tr>
                      @endforeach
                    
                    </tbody>
                  </table>
                @else
                    
                <div class="alert alert-info alert-dismissible">
                 
                    <h5><i class="icon fas fa-info"></i> Atenção</h5>
                    Você ainda não cadastrou nenhum detalhes. Clique abaixo para cadastrar
                  </div>

                @endif
                
              </div>

        </div>
        <div class="card-footer">
            <div class="row">
                <div class="col-lg-6">
                    <a href="{{ route('details.plan.create', $plan->id) }}" class="btn btn-info float-left">Adcionar Detalhes</a>
                </div>
                <div class="col-lg-6 float-right">

                    @if (isset($filters))

                        {!! $details->appends($filters)->links() !!}
                        
                    @else
                        {!! $details->links() !!}
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