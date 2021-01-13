@extends('adminlte::page')

@section('title', 'Lunch - Produtos')

@section('content_header')
    <h1>Produtos</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            
            <div class="row">
                <div class="col-md-6">
                    <h4 class="title"> <strong>Produtos Cadastrados</strong> </h4>
                </div>
                <div class="col-md-6">
                    <form action="{{ route('products.search') }}" method="POST" class="form form-inline float-right">
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
                    <th>Imagem</th>
                    <th>Nome</th>
                    <th>Descrição</th>
                    <th>Preço</th>
                    <th>Ações</th>
                  </tr>
                  </thead>
                  <tbody>

                    @foreach ($products as $product)
                        <tr>
                            <td>
                                <img src="{{ url("storage/{$product->image}") }}" alt="{{ $product->name }}" style="max-width:150px">
                            </td>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->description }}</td>
                            <td>{{ number_format($product->price, 2, '.', ',') }}</td>
                            
                            <td>
                                
                                    <div class="btn-group">
                                        <a href="{{ route('products.show', $product->id) }}" class="btn btn-info">Ver</a>
                                        <a href="{{ route('products.categories', $product->id) }}" class="btn btn-info">Categoria</a>

                                        
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
                    <a href="{{ route('products.create') }}" class="btn btn-info float-left"><i class="fas fa-plus "></i>Cadastrar Produtoss</a>
                </div>
                <div class="col-lg-6 float-right">

                    @if (isset($filters))

                        {!! $products->appends($filters)->links() !!}
                        
                    @else
                        {!! $products->links() !!}
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