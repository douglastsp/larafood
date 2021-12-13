@extends('adminlte::page')

@section('title', 'Categorias disponíveis para o produto')

@section('content_header')
    <h1>
        Categorias disponíveis para o produto: {{ $product->name }}
        <a href="" class="btn btn-outline-dark">
            <i class="fas fa-plus-square"></i>
            Novo
        </a>
    </h1>

    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('products.index') }}">Perfis</a></li>
        <li class="breadcrumb-item"><a href="{{ route('products.categories', $product->id) }}">Categorias do produto</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('products.categories.available', $product->id) }}">Categorias disponíveis para o produto</a></li>
    </ol>

@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <form action="{{ route('products.categories.available', $product->id) }}" class="form form-inline d-flex" method="post">
                @csrf
                <input
                    class="form-control w-25"
                    type="text"
                    name="filter"
                    id=""
                    placeholder="Filtrar por nome"
                    value="{{ $filters['filter'] ?? ''}}">
                <button type="submit" class="btn btn-outline-dark"><i class="fas fa-search"></i></button>
            </form>
        </div> {{-- Card-header --}}
        <div class="card-body">

            @include('admin.includes.alerts')

            <table class="table table-condensed">
                <thead>
                <tr>
                    <th width="50px">#</th>
                    <th>Nome</th>
                </tr>
                </thead>
                <tbody>
                <form action="{{ route('products.categories.attach', $product->id) }}" method="POST">
                    @csrf
                    @foreach ($categories as $category)
                        <tr>
                            <td><input type="checkbox" name="categories[]" value="{{ $category->id }}"></td>
                            <td>{{ $category->name }}</td>
                        </tr>
                    @endforeach
                    <tr>
                        <td colspan="500">
                            <button type="submit" class="btn btn-outline-dark">Vincular</button>
                        </td>
                    </tr>
                </form>
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
