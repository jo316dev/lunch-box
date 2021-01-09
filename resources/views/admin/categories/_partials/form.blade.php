
@include('admin.includes.alerts')

<div class="form-group">
    <label for="">Titulo Categoria</label>
    <input type="text" name="name" id="" class="form-control" placeholder="digite o nome" value="{{ $category->name ?? old('name') }}">
</div>

<div class="form-group">
    <label for="">Descrição</label>
    <input type="text" name="description" id="" class="form-control" placeholder="descrição" value="{{ $category->description ?? old('description') }}">
</div>


