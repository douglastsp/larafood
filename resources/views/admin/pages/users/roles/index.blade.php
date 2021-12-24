@extends('adminlte::page')

@section('title', 'Cargos do Usuário')

@section('content_header')
    <h1>
        Cargos do: {{ $user->name }}
        <a href="{{ route('users.roles.available', $user->id) }}" class="btn btn-outline-dark">
            <i class="fas fa-plus-square"></i>
            ADD
        </a>
    </h1>

    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('users.index') }}">Cargos</a></li>
        <li class="breadcrumb-item"><a href="{{ route('users.show', $user->id) }}">Detalhes do cargos</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('users.roles', $user->id) }}">Cargos do Usuário</a></li>
    </ol>

@stop

@section('content')
    <div class="card">
        <div class="card-body">

            @include('admin.includes.alerts')

            <table class="table table-condensed">
                <thead>
                <tr>
                    <th>Nome</th>
                    <th width="140" class="text-center"> Ações</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($roles as $role)
                    <tr>
                        <td>{{ $role->name }}</td>
                        <td>
                            <a href="{{ route('users.role.detach', [$user->id, $role->id]) }}" class="btn btn-outline-danger"><i class="fas fa-trash"></i> Remover</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div> {{-- Card-Body --}}
        <div class="card-footer">
            @if(empty($filters))
                {!! $roles->links() !!}
            @else
                {!! $roles->appends($filters)->links() !!}
            @endif
        </div>
    </div>{{-- Card --}}
@stop
