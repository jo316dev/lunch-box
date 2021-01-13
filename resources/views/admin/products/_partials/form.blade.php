@include('admin.includes.alerts')

<div class="form-group">
    <label for="">Nome</label>
    <input type="text" name="name" id="" placeholder="Insira o nome da categoria" class="form-control" value="{{ $product->name ?? old('name') }}">
</div>

<div class="form-group">
   <label for="">Imagem</label>
   <input type="file" name="image" id="" class="form-control">
</div>

<div class="form-group">
   <label for="">Preço</label>
   <input type="text" name="price" id="" placeholder="R$ 0,00" class="form-control" value="{{ $product->price ?? old('price') }}">
</div>


 <div class="form-group">
    <label for="">Descrição</label>
    <textarea name="description" id="" cols="30" rows="5" class="form-control">{{ $product->description ?? old('description') }}</textarea>
 </div>



 




