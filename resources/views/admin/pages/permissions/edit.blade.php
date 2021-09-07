@extends('adminlte::page')

@section('title', 'Editar Permissão')

@section('content_header')
    <h1>
        Editando Permissão: {{ $permission->name }}
    </h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('permissions.index') }}">Permissões</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('permissions.show', $permission->id) }}">Detalhes da permissão</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('permissions.edit', $permission->id) }}">Editar Permissão</a></li>
    </ol>

@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('permissions.update', $permission->id) }}" class="form" method="post">
                @method('PUT')
                @include('admin.pages.permissions._partials.form')
            </form>
        </div>{{-- body --}}
    </div>{{-- card --}}
@stop
