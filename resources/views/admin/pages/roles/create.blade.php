@extends('adminlte::page')

@section('title', 'Novo Cargo')

@section('content_header')
    <h1>
        Novo Cargo
    </h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('roles.index') }}">Cargos</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('roles.create') }}">Novo Cargo</a></li>
    </ol>

@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('roles.store') }}" class="form" method="post">
                @include('admin.pages.roles._partials.form')
            </form>
        </div>{{-- body --}}
    </div>{{-- card --}}
@stop
