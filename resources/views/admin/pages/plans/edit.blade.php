@extends('adminlte::page')

@section('title', 'Editar Plano')

@section('content_header')
    <h1>
        Editando o plano: <b>{{ $plan->name }}</b>
    </h1>

@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('plans.update', $plan->url) }}" class="form" method="post">
                @method('PUT')
                @csrf
                @include('admin.pages.plans._partials.form')
            </form>
        </div>{{-- body --}}
    </div>{{-- card --}}
@stop

