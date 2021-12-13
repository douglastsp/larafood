@extends('adminlte::page')

@section('title', 'Detalhes da Produto')

@section('content_header')
    <h1>
        Detalhes do Produto <b>{{ $product->name }}</b>
    </h1>

@stop

@section('content')
    <div class="card">
        <div class="card-body">

            @include('admin.includes.alerts')

            <ul>
                <li><strong>Nome: </strong>{{ $product->title }}</li>
                <li><strong>price: </strong>{{ number_format($product->price, 2, ',', '.') }}</li>
                <li><strong>Descrição: </strong>{{ $product->description }}</li>
            </ul>

            <img src="{{ asset("storage/{$product->picture}") }}" class="w-25" alt="">
        </div>{{-- body --}}
        <div class="card-footer d-flex">
            <a href="{{ route('products.categories', $product->id) }}" class="btn btn-outline-dark mr-2"><i class="fas fa-layer-group"></i> Categorias</a>
            <a href="{{ route('products.edit', $product->id) }}" class="btn btn-outline-warning mr-2"><i class="fas fa-pencil-alt"></i> Editar</a>
            <form action="{{ route('products.destroy', $product->id) }}" method="post">
                @method('DELETE')
                @csrf
                <button type="submit" class="btn btn-outline-danger"><i class="fas fa-trash"></i> Excluir</button>
            </form>
        </div>
    </div>{{-- card --}}
@stop
