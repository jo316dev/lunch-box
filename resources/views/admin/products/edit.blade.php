@extends('adminlte::page')

@section('title', 'Lunch - Editar product')

@section('content_header')
    <h1>Editar {{ $product->name }}</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">

        </div>
        <div class="card-body">
            
            <form action="{{ route('products.update', $product->id) }}" method="post" enctype="multipart/form-data">

                @csrf
                @method('PUT')


                @include('admin.products._partials.form')
                

                <div class="form-group">
                   <button type="submit" class="btn btn-info">Enviar</button>
                </div>

            </form>

           
        </div>
        <div class="card-footer">
            <a href="{{ route('products.index') }}" class="btn btn-warning float-left"><i class="fas fa-backspace "> Cancelar</i></a>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop