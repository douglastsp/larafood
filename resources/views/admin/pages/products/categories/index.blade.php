@extends('adminlte::page')

@section('title', 'Categorias do produto')

@section('content_header')
    <h1>
        Categorias do produto: {{ $product->title }}
        <a href="{{ route('products.categories.available', $product->id) }}" class="btn btn-outline-dark">
            <i class="fas fa-plus-square"></i>
            ADD
        </a>
    </h1>

    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('products.index') }}">Produtos</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('products.show', $product->id) }}">detalhes do produto</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('products.categories', $product->id) }}">Categorias do produto</a></li>
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
                @foreach ($categories as $category)
                    <tr>
                        <td>{{ $category->name }}</td>
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
                {!! $categories->links() !!}
            @else
                {!! $categories->appends($filters)->links() !!}
            @endif
        </div>
    </div>{{-- Card --}}
@stop
