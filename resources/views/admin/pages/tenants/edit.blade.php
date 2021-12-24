@extends('adminlte::page')

@section('title', 'Editar Empresa')

@section('content_header')
    <h1>
        Editando o Empresa: <b>{{ $tenant->name }}</b>
    </h1>

@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('tenants.update', $tenant->id) }}" class="form" method="post" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                @include('admin.pages.tenants._partials.form')
            </form>
        </div>{{-- body --}}
    </div>{{-- card --}}
@stop

