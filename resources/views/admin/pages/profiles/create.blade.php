@extends('adminlte::page')

@section('title', 'Novo Perfil')

@section('content_header')
    <h1>
        Novo Perfil
    </h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('profiles.index') }}">Perfis</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('profiles.create') }}">Novo Perfil</a></li>
    </ol>

@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('profiles.store') }}" class="form" method="post">
                @include('admin.pages.profiles._partials.form')
            </form>
        </div>{{-- body --}}
    </div>{{-- card --}}
@stop
