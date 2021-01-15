
@include('admin.includes.alerts')

<div class="form-group">
    <label for="">Nome do Cargo</label>
    <input type="text" name="name" id="" class="form-control" placeholder="digite o nome" value="{{ $role->name ?? old('name') }}">
</div>

<div class="form-group">
    <label for="">Descrição</label>
    <input type="text" name="description" id="" class="form-control" placeholder="Breve descrição" value="{{ $role->description ?? old('description') }}">
</div>
