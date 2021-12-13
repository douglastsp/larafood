@include('admin.includes.alerts')

<div class="form-group">
    <label for="">Identificador da mesa:</label>
    <input type="text" name="identify" class="form-control" id=""
           value="{{ $table->identify ?? old('identify') }}" placeholder="Identificador da mesa:">
</div>{{-- form-group --}}

<div class="form-group">
    <label for="">Descrição</label>
    <textarea 
        name="description" 
        cols="30" rows="5" 
        class="form-control">{{ $table->description ?? old('description') }}</textarea>
</div>{{-- form-group --}}

<div class="form-group">
    <button type="submit" class="btn btn-outline-dark"><i class="fas fa-save"></i> Salvar</button>
    <a href="{{ route('users.index') }}" class="btn btn-outline-danger"><i class="fas fa-ban"></i> Cancelar</a>
</div>{{-- form-group --}}
