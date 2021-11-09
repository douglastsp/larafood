@extends('adminlte::page')

@section('title', 'Perfis do Plano')

@section('content_header')
    <h1>
        Perfis do Plano: {{ $plan->name }}
        <a href="{{ route('plans.profiles.available', $plan->id) }}" class="btn btn-outline-dark">
            <i class="fas fa-plus-square"></i>
            ADD
        </a>
    </h1>

    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('plans.index') }}">Planos</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('plans.profiles', $plan->id) }}">Perfis do Plano</a></li>
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
                            <a href="{{ route('plans.profile.detach', [$plan->id, $profile->id]) }}" class="btn btn-outline-danger"><i class="fas fa-trash"></i> Remover</a>
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
