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
            <ul>
                <li><strong>Nome: </strong>{{ $plan->name }}</li>
                <li><strong>Url: </strong>{{ $plan->url }}</li>
                <li><strong>Preço: </strong>R$ {{ number_format($plan->price, 2, ',', '.') }}</li>
                <li><strong>Descrição: </strong>{{ $plan->description }}</li>
            </ul>
        </div>{{-- body --}}
        <div class="card-footer">
            <form action="{{ route('plans.destroy', $plan->url) }}" method="post">
                @method('DELETE')
                @csrf
                <button type="submit" class="btn btn-outline-danger"><i class="fas fa-trash"></i> Excluir</button>
            </form>
        </div>
    </div>{{-- card --}}
@stop