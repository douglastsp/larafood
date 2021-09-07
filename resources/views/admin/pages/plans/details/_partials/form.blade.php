@include('admin.includes.alerts')

@csrf
<div class="form-group">
    <label for="">Nome:</label>
    <input class="form-control" type="text" name="name" id="" placeholder="Nome:" value=" {{ $detail->name ?? old('name') }}">
</div>

<div class="form-group">
    <button type="submit" class="btn btn-outline-dark"><i class="fas fa-save"></i> Salvar</button>
    <a href="{{ route('details.plan.index', $plan->url) }}" class="btn btn-outline-danger"><i class="fas fa-ban"></i> Cancelar</a>
</div>{{-- form-group --}}
