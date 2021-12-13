@extends('adminlte::page')

@section('title', 'Editar Produto')

@section('content_header')
    <h1>
        Editando o Produto: <b>{{ $product->name }}</b>
    </h1>

@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('products.update', $product->id) }}" class="form" method="post" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                @include('admin.pages.products._partials.form')
            </form>
        </div>{{-- body --}}
    </div>{{-- card --}}
@stop

