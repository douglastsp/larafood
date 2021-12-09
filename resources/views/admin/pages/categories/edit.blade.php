@extends('adminlte::page')

@section('title', 'Editar Categoria')

@section('content_header')
    <h1>
        Editando o Categoria: <b>{{ $category->name }}</b>
    </h1>

@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('categories.update', $category->id) }}" class="form" method="post">
                @method('PUT')
                @csrf
                @include('admin.pages.categories._partials.form')
            </form>
        </div>{{-- body --}}
    </div>{{-- card --}}
@stop

