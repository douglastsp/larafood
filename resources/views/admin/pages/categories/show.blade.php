@extends('adminlte::page')

@section('title', 'Detalhes da Categoria')

@section('content_header')
    <h1>
        Detalhes do Categoria <b>{{ $category->name }}</b>
    </h1>

@stop

@section('content')
    <div class="card">
        <div class="card-body">

            @include('admin.includes.alerts')

            <ul>
                <li><strong>Nome: </strong>{{ $category->name }}</li>
                <li><strong>url: </strong>{{ $category->url }}</li>
                <li><strong>Descrição: </strong>{{ $category->description }}</li>
            </ul>
        </div>{{-- body --}}
        <div class="card-footer d-flex">
            <a href="{{ route('categories.products', $category->id) }}" class="btn btn-outline-dark mr-2"><i class="fab fa-product-hunt"></i> Produtos</a>
            <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-outline-warning mr-2"><i class="fas fa-pencil-alt"></i> Editar</a>
            <form action="{{ route('categories.destroy', $category->id) }}" method="post">
                @method('DELETE')
                @csrf
                <button type="submit" class="btn btn-outline-danger"><i class="fas fa-trash"></i> Excluir</button>
            </form>
        </div>
    </div>{{-- card --}}
@stop
