@extends('adminlte::page')

@section('title', 'Cargos disponíveis para')

@section('content_header')
    <h1>
        Cargos disponíveis para: {{ $user->name }}
        <a href="" class="btn btn-outline-dark">
            <i class="fas fa-plus-square"></i>
            Novo
        </a>
    </h1>

    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('users.index') }}">Usuarios</a></li>
        <li class="breadcrumb-item"><a href="{{ route('users.show', $user->id) }}">Detalhes do Usuário</a></li>
        <li class="breadcrumb-item"><a href="{{ route('users.roles', $user->id) }}">Cargos do Usuário</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('users.roles.available', $user->id) }}">Cargos disponíveis</a></li>
    </ol>

@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <form action="{{ route('users.roles.available', $user->id) }}" class="form form-inline d-flex" method="post">
                @csrf
                <input
                    class="form-control w-25"
                    type="text"
                    name="filter"
                    id=""
                    placeholder="Filtrar por nome"
                    value="{{ $filters['filter'] ?? ''}}">
                <button type="submit" class="btn btn-outline-dark"><i class="fas fa-search"></i></button>
            </form>
        </div> {{-- Card-header --}}
        <div class="card-body">

            @include('admin.includes.alerts')

            <table class="table table-condensed">
                <thead>
                <tr>
                    <th width="50px">#</th>
                    <th>Nome</th>
                </tr>
                </thead>
                <tbody>
                <form action="{{ route('users.roles.attach', $user->id) }}" method="POST">
                    @csrf
                    @foreach ($roles as $role)
                        <tr>
                            <td><input type="checkbox" name="roles[]" value="{{ $role->id }}"></td>
                            <td>{{ $role->name }}</td>
                        </tr>
                    @endforeach
                    <tr>
                        <td colspan="500">
                            <button type="submit" class="btn btn-outline-dark">Vincular</button>
                        </td>
                    </tr>
                </form>
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
