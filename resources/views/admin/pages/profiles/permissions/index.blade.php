@extends('adminlte::page')

@section('title', 'Permissões do perfil')

@section('content_header')
    <h1>
        Permissões do perfil: {{ $profile->name }}
        <a href="{{ route('profiles.permissions.available', $profile->id) }}" class="btn btn-outline-dark">
            <i class="fas fa-plus-square"></i>
            ADD
        </a>
    </h1>

    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('profiles.index') }}">Perfis</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('profiles.permissions', $profile->id) }}">Permissões do perfil</a></li>
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
                            <a href="{{ route('profiles.permission.detach', [$profile->id, $permission->id]) }}" class="btn btn-outline-danger"><i class="fas fa-trash"></i> Remover</a>
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
