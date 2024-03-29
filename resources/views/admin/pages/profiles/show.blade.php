@extends('adminlte::page')

@section('title', 'Detalhes do Plano')

@section('content_header')
    <h1>
        Detalhes do perfil <b>{{ $profile->name }}</b>
    </h1>

    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('profiles.index') }}">Perfis</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('profiles.show', $profile->id) }}">Detalhes do perfil</a></li>
    </ol>

@stop

@section('content')
    <div class="card">
        <div class="card-body">

            @include('admin.includes.alerts')

            <ul>
                <li><strong>Nome: </strong>{{ $profile->name }}</li>
                <li><strong>Descrição: </strong>{{ $profile->description }}</li>
            </ul>
        </div>{{-- body --}}
        <div class="card-footer d-flex">
            <a href="{{ route('profiles.plans', $profile->id) }}" class="btn btn-outline-dark mr-2"><i class="fas fa-lock"></i> Planos</a>
            <a href="{{ route('profiles.permissions', $profile->id) }}" class="btn btn-outline-dark mr-2"><i class="fas fa-lock"></i> Permissões</a>
            <a href="{{ route('profiles.edit', $profile->id) }}" class="btn btn-outline-warning mr-2"><i class="fas fa-pencil-alt"></i> Editar</a>
            <form action="{{ route('profiles.destroy', $profile->id) }}" method="post">
                @method('DELETE')
                @csrf
                <button type="submit" class="btn btn-outline-danger"><i class="fas fa-trash"></i> Excluir</button>
            </form>
        </div>
    </div>{{-- card --}}
@stop
