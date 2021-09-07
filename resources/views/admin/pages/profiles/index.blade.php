@extends('adminlte::page')

@section('title', 'Perfis')

@section('content_header')
    <h1>
        Perfis
        <a href="{{ route('profiles.create') }}" class="btn btn-outline-dark">
            <i class="fas fa-plus-square"></i>
            Novo
        </a>
    </h1>

    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('profiles.index') }}">Perfis</a></li>
    </ol>

@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <form action="{{ route('profiles.search') }}" class="form form-inline d-flex" method="post">
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
                    <th>Nome</th>
                    <th width="200" class="text-center"> Ações</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($profiles as $profile)
                    <tr>
                        <td>{{ $profile->name }}</td>
                        <td>
                            <a href="{{ route('profiles.show', $profile->id) }}" class="btn btn-outline-warning"><i class="fas fa-eye"></i>Ver</a>
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
