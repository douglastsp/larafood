@extends('adminlte::page')

@section('title', 'perfis vinculados a permissão')

@section('content_header')
    <h1>
        Perfis vinculados a permissão: {{ $permission->name }}
    </h1>

    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('permissions.index') }}">Permissões</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('permissions.show', $permission->id) }}">Detalhes da permissão</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('permissions.profiles', $permission->id) }}">Perfis vinculados</a></li>
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
                @foreach ($profiles as $profile)
                    <tr>
                        <td>{{ $profile->name }}</td>
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
                {!! $profiles->links() !!}
            @else
                {!! $profiles->appends($filters)->links() !!}
            @endif
        </div>
    </div>{{-- Card --}}
@stop
