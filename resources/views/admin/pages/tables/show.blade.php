@extends('adminlte::page')

@section('title', 'Detalhes da Mesa')

@section('content_header')
    <h1>
        Detalhes do Mesa <b>{{ $table->identify }}</b>
    </h1>

@stop

@section('content')
    <div class="card">
        <div class="card-body">

            @include('admin.includes.alerts')

            <ul>
                <li><strong>Identificação: </strong>{{ $table->identify }}</li>
                <li><strong>Descrição: </strong>{{ $table->description }}</li>
            </ul>
        </div>{{-- body --}}
        <div class="card-footer d-flex">
            <a href="{{ route('tables.edit', $table->id) }}" class="btn btn-outline-warning mr-2"><i class="fas fa-pencil-alt"></i> Editar</a>
            <form action="{{ route('tables.destroy', $table->id) }}" method="post">
                @method('DELETE')
                @csrf
                <button type="submit" class="btn btn-outline-danger"><i class="fas fa-trash"></i> Excluir</button>
            </form>
        </div>
    </div>{{-- card --}}
@stop
