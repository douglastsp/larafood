@extends('adminlte::page')

@section('title', 'Detalhes do Plano')

@section('content_header')
    <h1>
        Mostrando o detalhe do plano {{ $plan->name }}
    </h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('plans.index') }}">Planos</a></li>
        <li class="breadcrumb-item"><a href="{{ route('plans.show', $plan->url) }}">{{ $plan->name }}</a></li>
        <li class="breadcrumb-item"><a href="{{ route('details.plan.index', $plan->url) }}" class="active">Detalhes</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('details.plan.show', [$plan->url, $detail->id]) }}" class="active">Mostrando detalhes</a></li>
    </ol>

@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <ul>
                <li>Nome: {{ $detail->name }}</li>
            </ul>
        </div>{{-- card-body --}}
        <div class="card-footer d-flex">
            <form action="{{ route('details.plan.destroy', [$plan->url, $detail->id]) }}" method="post">
                @method('DELETE')
                @csrf
                <button type="submit" class="btn btn-outline-danger"><i class="fas fa-trash"></i> Excluir</button>
            </form>
        </div>{{-- card-footer --}}
    </div>{{-- card --}}
@stop
