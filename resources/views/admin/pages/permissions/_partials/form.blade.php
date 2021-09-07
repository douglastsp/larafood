@include('admin.includes.alerts')
@csrf
<div class="form-group">
    <label for="">Nome</label>
    <input type="text" name="name" class="form-control" id=""
           value="{{ $permission->name ?? old('name') }}" placeholder="Nome:">
</div>{{-- form-group --}}

<div class="form-group">
    <label for="">Descrição</label>
    <input type="text" name="description" class="form-control" id=""
           value="{{ $permission->description ?? old('description') }}" placeholder="Descrição:">
</div>{{-- form-group --}}

<div class="form-group">
    <button type="submit" class="btn btn-outline-dark"><i class="fas fa-save"></i> Salvar</button>
    <a href="{{ route('permissions.index') }}" class="btn btn-outline-danger"><i class="fas fa-ban"></i> Cancelar</a>
</div>{{-- form-group --}}
