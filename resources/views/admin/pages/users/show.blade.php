@extends('adminlte::page')

@section('title', 'Detalhes do Usuário')

@section('content_header')
    <h1>
        Detalhes do Usuário <b>{{ $user->name }}</b>
    </h1>

@stop

@section('content')
    <div class="card">
        <div class="card-body">

            @include('admin.includes.alerts')

            <ul>
                <li><strong>Nome: </strong>{{ $user->name }}</li>
                <li><strong>E-mail: </strong>{{ $user->email }}</li>
                <li><strong>Empresa: </strong>{{ $user->tenant->name }}</li>
            </ul>
        </div>{{-- body --}}
        <div class="card-footer d-flex">
            <a href="{{ route('users.roles', $user->id) }}" class="btn btn-outline-dark mr-2"><i class="fas fa-id-card-alt"></i> Cargos</a>
            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-outline-warning mr-2"><i class="fas fa-pencil-alt"></i> Editar</a>
            <form action="{{ route('users.destroy', $user->id) }}" method="post">
                @method('DELETE')
                @csrf
                <button type="submit" class="btn btn-outline-danger"><i class="fas fa-trash"></i> Excluir</button>
            </form>
        </div>
    </div>{{-- card --}}
@stop
