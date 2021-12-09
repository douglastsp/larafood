@extends('adminlte::page')

@section('title', 'Novo Categoria')

@section('content_header')
    <h1>
        Nova Categoria
    </h1>

@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('categories.store') }}" class="form" method="post">
                @csrf
                @include('admin.pages.categories._partials.form')
            </form>
        </div>{{-- body --}}
    </div>{{-- card --}}
@stop
