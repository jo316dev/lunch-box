@extends('adminlte::page')

@section('title', 'Lunch - Editar Usuario')

@section('content_header')
    <h1>Produto: <strong>{{ $product->name }}</strong></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            @include('admin.includes.alerts')
        </div>
        <div class="card-body">

            <div class="row">
                <div class="col-12 col-sm-6">
                    <img src="{{ url("storage/$product->image") }}" alt="{{ $product->name }}" class="product-image"style="max-width:500px">
                 
                </div>

               

                <div class="col-12 col-sm-6">
                    <h3 class="my-3">{{ $product->name }}</h3>
                    
                    <p>R$ {{ number_format($product->price, 2, ".", ",") }}</p>
                    <p>{{ $product->description }}</p>

                    @foreach ($product->categories as $category)
                        <small class="badge badge-warning">{{ $category->name }}</small>
                    @endforeach
                    
                    

                </div>

            </div>
            
            
        
           
        </div>
        <div class="card-footer">
           
                <div class="btn-group">
                  
                    {{-- <a href="{{ route('details.product.index', $product->id) }}" class="btn btn-success">Ver detalhes</a> --}}
                    <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning ">Editar</a>
                    <a href="{{ route('products.categories', $product->id) }}" class="btn btn-info ">ver Categorias</a>
                
        
                    <form action="{{ route('products.destroy', $product->id) }}" method="POST">
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