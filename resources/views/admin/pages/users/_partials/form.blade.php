@include('admin.includes.alerts')

<div class="form-group">
    <label for="">Nome</label>
    <input type="text" name="name" class="form-control" id=""
           value="{{ $user->name ?? old('name') }}" placeholder="Nome:">
</div>{{-- form-group --}}

<div class="form-group">
    <label for="">E-mail</label>
    <input type="email" name="email" class="form-control" id=""
           value="{{ $user->email ?? old('email') }}" placeholder="E-mail:">
</div>{{-- form-group --}}

<div class="form-group">
    <label for="">Senha</label>
    <input type="password" name="password" class="form-control" id="" placeholder="Senha:">
</div>{{-- form-group --}}

<div class="form-group">
    <button type="submit" class="btn btn-outline-dark"><i class="fas fa-save"></i> Salvar</button>
    <a href="{{ route('users.index') }}" class="btn btn-outline-danger"><i class="fas fa-ban"></i> Cancelar</a>
</div>{{-- form-group --}}
