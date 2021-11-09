@extends('adminlte::page')

@section('title', 'Planos vinculados ao perfil')

@section('content_header')
    <h1>
        Planos vinculados a perfil: {{ $profile->name }}
    </h1>

    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('profiles.index') }}">Perfis</a></li>
        <li class="breadcrumb-item"><a href="{{ route('profiles.show', $profile->id) }}">Detalhes do perfil</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('profiles.plans', $profile->id) }}">Planos do Perfil</a></li>
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
                @foreach ($plans as $plan)
                    <tr>
                        <td>{{ $plan->name }}</td>
                        <td>
                            <a href="{{ route('plans.profile.detach', [$plan->id, $profile->id]) }}" class="btn btn-outline-danger"><i class="fas fa-trash"></i> Remover</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div> {{-- Card-Body --}}
        <div class="card-footer">
            @if(empty($filters))
                {!! $plans->links() !!}
            @else
                {!! $plans->appends($filters)->links() !!}
            @endif
        </div>
    </div>{{-- Card --}}
@stop
