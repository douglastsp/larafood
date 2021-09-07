@include('admin.includes.alerts')

<div class="form-group">
    <label for="">Nome</label>
    <input type="text" name="name" class="form-control" id=""
           value="{{ $plan->name ?? old('name') }}" placeholder="Nome:">
</div>{{-- form-group --}}

<div class="form-group">
    <label for="">Preço</label>
    <input type="text" name="price" class="form-control" id=""
           value="{{ $plan->price ?? old('price') }}" placeholder="Preço:">
</div>{{-- form-group --}}

<div class="form-group">
    <label for="">Descrição</label>
    <input type="text" name="description" class="form-control" id=""
           value="{{ $plan->description ?? old('description') }}" placeholder="Descrição:">
</div>{{-- form-group --}}

<div class="form-group">
    <button type="submit" class="btn btn-outline-dark"><i class="fas fa-save"></i> Salvar</button>
    <a href="{{ route('plans.index') }}" class="btn btn-outline-danger"><i class="fas fa-ban"></i> Cancelar</a>
</div>{{-- form-group --}}
