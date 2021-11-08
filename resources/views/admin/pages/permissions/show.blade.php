@extends('adminlte::page')

@section('title', 'Detalhes da Permissão')

@section('content_header')
    <h1>
        Detalhes da permissão: <b>{{ $permission->name }}</b>
    </h1>

    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('permissions.index') }}">Permissões</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('permissions.show', $permission->id) }}">Detalhes da permissão</a></li>
    </ol>

@stop

@section('content')
    <div class="card">
        <div class="card-body">

            @include('admin.includes.alerts')

            <ul>
                <li><strong>Nome: </strong>{{ $permission->name }}</li>
                <li><strong>Descrição: </strong>{{ $permission->description }}</li>
            </ul>
        </div>{{-- body --}}
        <div class="card-footer d-flex">
            <a href="{{ route('permissions.profiles', $permission->id) }}" class="btn btn-outline-dark mr-2"><i class="fas fa-id-card"></i> Perfis</a>
            <a href="{{ route('permissions.edit', $permission->id) }}" class="btn btn-outline-warning mr-2"><i class="fas fa-pencil-alt"></i> Editar</a>
            <form action="{{ route('permissions.destroy', $permission->id) }}" method="post">
                @method('DELETE')
                @csrf
                <button type="submit" class="btn btn-outline-danger"><i class="fas fa-trash"></i> Excluir</button>
            </form>
        </div>
    </div>{{-- card --}}
@stop
