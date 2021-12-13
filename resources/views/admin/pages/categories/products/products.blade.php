@extends('adminlte::page')

@section('title', 'perfis vinculados a permissão')

@section('content_header')
    <h1>
        Perfis vinculados a permissão: {{ $category->name }}
    </h1>

    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('categories.index') }}">Categorias</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('categories.show', $category->id) }}">Detalhes da Categoria</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('categories.products', $category->id) }}">Produtos vinculados</a></li>
    </ol>

@stop

@section('content')
    <div class="card">
        <div class="card-body">

            @include('admin.includes.alerts')

            <table class="table table-condensed">
                <thead>
                <tr>
                    <th>Nome</th>
                    <th width="140" class="text-center"> Ações</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>{{ $product->title }}</td>
                        <td>
                            <a href="{{ route('products.categories.detach', [$product->id, $category->id]) }}" class="btn btn-outline-danger"><i class="fas fa-trash"></i> Remover</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div> {{-- Card-Body --}}
        <div class="card-footer">
            @if(empty($filters))
                {!! $products->links() !!}
            @else
                {!! $products->appends($filters)->links() !!}
            @endif
        </div>
    </div>{{-- Card --}}
@stop
