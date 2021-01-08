
@include('admin.includes.alerts')

<div class="form-group">
    <label for="">Nome do Usuario</label>
    <input type="text" name="name" id="" class="form-control" placeholder="digite o nome" value="{{ $user->name ?? old('name') }}">
</div>

<div class="form-group">
    <label for="">Email</label>
    <input type="text" name="email" id="" class="form-control" placeholder="Email do usuario" value="{{ $user->email ?? old('email') }}">
</div>


<div class="form-group">
    <label for="">Senha</label>
    <input type="password" name="password" id="" class="form-control" placeholder="senha com 6 digitos">
</div>