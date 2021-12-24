@extends('adminlte::page')

@section('title', 'Editar Cargo')

@section('content_header')
    <h1>
        Editando Cargo {{ $role->name }}
    </h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('roles.index') }}">Cargos</a></li>
        <li class="breadcrumb-item"><a href="{{ route('roles.show', $role->id) }}">Detalhes do cargo</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('roles.edit', $role->id) }}">Editar Cargo</a></li>
    </ol>

@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('roles.update', $role->id) }}" class="form" method="post">
                @method('PUT')
                @include('admin.pages.roles._partials.form')
            </form>
        </div>{{-- body --}}
    </div>{{-- card --}}
@stop
