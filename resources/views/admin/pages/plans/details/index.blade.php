@extends('adminlte::page')

@section('title', 'Detalhes do Planos')

@section('content_header')
    <h1>
        Detalhes do Plano: <b>{{ $plan->name }}</b>
        <a href="{{ route('details.plan.create', $plan->url) }}" class="btn btn-outline-dark">
            <i class="fas fa-plus-square"></i>
            Novo
        </a>
    </h1>

    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('plans.index') }}">Planos</a></li>
        <li class="breadcrumb-item"><a href="{{ route('plans.show', $plan->url) }}">{{ $plan->name }}</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('details.plan.index', $plan->url) }}" class="active">Detalhes</a></li>
    </ol>

@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <table class="table table-condensed">
                <thead>
                <tr>
                    <th>Nome</th>
                    <th width="100"> Ações</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($details as $detail)
                    <tr>
                        <td>{{ $detail->name }}</td>
                        <td>
                            <a href="{{ route('plans.show', $plan->url) }}" class="btn btn-warning"><i class="fas fa-eye"></i>Ver</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div> {{-- Card-Body --}}
        <div class="card-footer">
            @if(empty($filters))
                {!! $details->links() !!}
            @else
                {!! $details->appends($filters)->links() !!}
            @endif
        </div>{{-- card-footer --}}
    </div>{{-- Card --}}
@stop
