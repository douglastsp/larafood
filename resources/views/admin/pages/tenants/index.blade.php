@extends('adminlte::page')

@section('title', 'Empresas')

@section('content_header')
    <h1>
        Empresas
    </h1>

    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('tenants.index') }}">Empresas</a></li>
    </ol>

@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <form action="{{ route('tenants.search') }}" class="form form-inline d-flex" method="post">
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
                        <th>Logo</th>
                        <th>Name</th>
                        <th width="100" class="text-center"> Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tenants as $tenant)
                        <tr>
                            <td><img src="{{ asset("storage/{$tenant->logo}") }}" style="width:5vh;" alt=""></td>
                            <td>{{ $tenant->name }}</td>
                            <td>
                                <a href="{{ route('tenants.show', $tenant->id) }}" class="btn btn-outline-warning"><i class="fas fa-eye"></i>Ver</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div> {{-- Card-Body --}}
        <div class="card-footer">
            @if(empty($filters))
                {!! $tenants->links() !!}
            @else
                {!! $tenants->appends($filters)->links() !!}
            @endif
        </div>
    </div>{{-- Card --}}
@stop
