@include('admin.includes.alerts')

<div class="form-group">
    <label for="">Title</label>
    <input type="text" name="title" class="form-control" id=""
           value="{{ $product->title ?? old('title') }}" placeholder="Titulo:">
</div>{{-- form-group --}}

<div class="form-group">
    <label for="">Preço</label>
    <input type="text" name="price" class="form-control" id=""
           value="{{ $product->price ?? old('price') }}" placeholder="Preço:">
</div>{{-- form-group --}}

<div class="form-group">
    <label for="">Descrição</label>
    <textarea 
        name="description" 
        cols="30" rows="5" 
        class="form-control">{{ $product->description ?? old('description') }}</textarea>
</div>{{-- form-group --}}

<div class="form-group">
    <label for="">Imagem</label>
    <input type="file" name="picture" class="form-control" id="">
</div>{{-- form-group --}}

<div class="form-group">
    <button type="submit" class="btn btn-outline-dark"><i class="fas fa-save"></i> Salvar</button>
    @if (!empty($product->id))
        <a href="{{ route('products.show', $product->id) }}" class="btn btn-outline-danger"><i class="fas fa-ban"></i> Cancelar</a>
    @else
        <a href="{{ route('products.index') }}" class="btn btn-outline-danger"><i class="fas fa-ban"></i> Cancelar</a>
    @endif
</div>{{-- form-group --}}
