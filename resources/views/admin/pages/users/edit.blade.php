@extends('adminlte::page')

@section('title', 'Editar Usuário')

@section('content_header')
    <h1>
        Editando o Usuário: <b>{{ $user->name }}</b>
    </h1>

@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('users.update', $user->id) }}" class="form" method="post">
                @method('PUT')
                @csrf
                @include('admin.pages.users._partials.form')
            </form>
        </div>{{-- body --}}
    </div>{{-- card --}}
@stop

