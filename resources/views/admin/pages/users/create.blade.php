@extends('adminlte::page')

@section('title', 'Novo Usuário')

@section('content_header')
    <h1>
        Novo Usuário
    </h1>

@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('users.store') }}" class="form" method="post">
                @csrf
                @include('admin.pages.users._partials.form')
            </form>
        </div>{{-- body --}}
    </div>{{-- card --}}
@stop
