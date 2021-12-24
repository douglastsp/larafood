@extends('adminlte::page')

@section('title', 'Permissões disponíveis para o cargo')

@section('content_header')
    <h1>
        Permissões disponíveis para o cargo: {{ $role->name }}
        <a href="" class="btn btn-outline-dark">
            <i class="fas fa-plus-square"></i>
            Novo
        </a>
    </h1>

    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('roles.index') }}">Cargos</a></li>
        <li class="breadcrumb-item"><a href="{{ route('roles.show', $role->id) }}">Detalhes do cargo</a></li>
        <li class="breadcrumb-item"><a href="{{ route('roles.permissions', $role->id) }}">Permissões do cargo</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('roles.permissions.available', $role->id) }}">Permissões disponíveis para o cargo</a></li>
    </ol>

@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <form action="{{ route('roles.permissions.available', $role->id) }}" class="form form-inline d-flex" method="post">
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
                <form action="{{ route('roles.permissions.attach', $role->id) }}" method="POST">
                    @csrf
                    @foreach ($permissions as $permission)
                        <tr>
                            <td><input type="checkbox" name="permissions[]" value="{{ $permission->id }}"></td>
                            <td>{{ $permission->name }}</td>
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
                {!! $permissions->links() !!}
            @else
                {!! $permissions->appends($filters)->links() !!}
            @endif
        </div>
    </div>{{-- Card --}}
@stop
