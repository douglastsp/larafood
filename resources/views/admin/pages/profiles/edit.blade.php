@extends('adminlte::page')

@section('title', 'Editar Perfil')

@section('content_header')
    <h1>
        Editando Perfil {{ $profile->name }}
    </h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('profiles.index') }}">Perfis</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('profiles.show', $profile->id) }}">Detalhes do perfil</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('profiles.edit', $profile->id) }}">Editar Perfil</a></li>
    </ol>

@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('profiles.update', $profile->id) }}" class="form" method="post">
                @method('PUT')
                @include('admin.pages.profiles._partials.form')
            </form>
        </div>{{-- body --}}
    </div>{{-- card --}}
@stop
