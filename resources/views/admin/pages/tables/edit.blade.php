@extends('adminlte::page')

@section('title', 'Editar Mesa')

@section('content_header')
    <h1>
        Editando o Mesa: <b>{{ $table->identify }}</b>
    </h1>

@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('tables.update', $table->id) }}" class="form" method="post">
                @method('PUT')
                @csrf
                @include('admin.pages.tables._partials.form')
            </form>
        </div>{{-- body --}}
    </div>{{-- card --}}
@stop

