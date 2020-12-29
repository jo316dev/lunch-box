
@include('admin.includes.alerts')

<div class="form-group">
    <label for="">Nome do Plano</label>
    <input type="text" name="name" id="" class="form-control" placeholder="digite o nome" value="{{ $plan->name ?? old('name') }}">
</div>

<div class="form-group">
    <label for="">Descrição</label>
    <input type="text" name="description" id="" class="form-control" placeholder="Breve descrição" value="{{ $plan->description ?? old('description') }}">
</div>


<div class="form-group">
    <label for="">Preço</label>
    <input type="text" name="price" id="" class="form-control" placeholder="R$ 0.00" value="{{ $plan->price ?? old('price') }}">
</div>