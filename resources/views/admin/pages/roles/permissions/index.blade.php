@extends('adminlte::page')

@section('title', 'Permissões do cargo')

@section('content_header')
    <h1>
        Permissões do cargo: {{ $role->name }}
        <a href="{{ route('roles.permissions.available', $role->id) }}" class="btn btn-outline-dark">
            <i class="fas fa-plus-square"></i>
            ADD
        </a>
    </h1>

    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('roles.index') }}">Cargos</a></li>
        <li class="breadcrumb-item"><a href="{{ route('roles.show', $role->id) }}">Detalhes do cargos</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('roles.permissions', $role->id) }}">Permissões do cargo</a></li>
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
                @foreach ($permissions as $permission)
                    <tr>
                        <td>{{ $permission->name }}</td>
                        <td>
                            <a href="{{ route('roles.permission.detach', [$role->id, $permission->id]) }}" class="btn btn-outline-danger"><i class="fas fa-trash"></i> Remover</a>
                        </td>
                    </tr>
                @endforeach
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
