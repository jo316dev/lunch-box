
@include('admin.includes.alerts')

<div class="form-group">
    <label for="">Titulo</label>
    <input type="text" name="name" id="" class="form-control" placeholder="digite o nome" value="{{ $permission->name ?? old('name') }}">
</div>

<div class="form-group">
    <label for="">Descrição</label>
    <input type="text" name="description" id="" class="form-control" placeholder="Breve descrição" value="{{ $permission->description ?? old('description') }}">
</div>
