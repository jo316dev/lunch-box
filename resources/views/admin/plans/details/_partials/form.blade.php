
@include('admin.includes.alerts')

<div class="form-group">
    <label for="">Titulo Detalhe</label>
    <input type="text" name="name" id="" class="form-control" placeholder="digite o nome" value="{{ $detail->name ?? old('name') }}">
</div>


