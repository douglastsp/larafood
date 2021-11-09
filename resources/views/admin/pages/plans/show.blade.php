@extends('adminlte::page')

@section('title', 'Detalhes do Plano')

@section('content_header')
    <h1>
        Detalhes do Plano <b>{{ $plan->name }}</b>
    </h1>

@stop

@section('content')
    <div class="card">
        <div class="card-body">

            @include('admin.includes.alerts')

            <ul>
                <li><strong>Nome: </strong>{{ $plan->name }}</li>
                <li><strong>Url: </strong>{{ $plan->url }}</li>
                <li><strong>Preço: </strong>R$ {{ number_format($plan->price, 2, ',', '.') }}</li>
                <li><strong>Descrição: </strong>{{ $plan->description }}</li>
            </ul>
        </div>{{-- body --}}
        <div class="card-footer d-flex">
            <a href="{{ route('plans.profiles', $plan->id) }}" class="btn btn-outline-dark mr-2"><i class="fas fa-lock"></i> Perfis</a>
            <a href="{{ route('details.plan.index', $plan->url) }}" class="btn btn-outline-dark mr-2"><i class="fas fa-eye"></i> Detalhes</a>
            <a href="{{ route('plans.edit', $plan->url) }}" class="btn btn-outline-warning mr-2"><i class="fas fa-pencil-alt"></i> Editar</a>
            <form action="{{ route('plans.destroy', $plan->url) }}" method="post">
                @method('DELETE')
                @csrf
                <button type="submit" class="btn btn-outline-danger"><i class="fas fa-trash"></i> Excluir</button>
            </form>
        </div>
    </div>{{-- card --}}
@stop
