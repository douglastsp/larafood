@extends('adminlte::page')

@section('title', 'Detalhes do Cargo')

@section('content_header')
    <h1>
        Detalhes do cargo <b>{{ $role->name }}</b>
    </h1>

    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('roles.index') }}">Cargos</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('roles.show', $role->id) }}">Detalhes do cargo</a></li>
    </ol>

@stop

@section('content')
    <div class="card">
        <div class="card-body">

            @include('admin.includes.alerts')

            <ul>
                <li><strong>Nome: </strong>{{ $role->name }}</li>
                <li><strong>Descrição: </strong>{{ $role->description }}</li>
            </ul>
        </div>{{-- body --}}
        <div class="card-footer d-flex">
            <a href="{{ route('roles.permissions', $role->id) }}" class="btn btn-outline-dark mr-2"><i class="fas fa-lock"></i> Permissões</a>
            <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-outline-warning mr-2"><i class="fas fa-pencil-alt"></i> Editar</a>
            <form action="{{ route('roles.destroy', $role->id) }}" method="post">
                @method('DELETE')
                @csrf
                <button type="submit" class="btn btn-outline-danger"><i class="fas fa-trash"></i> Excluir</button>
            </form>
        </div>
    </div>{{-- card --}}
@stop
