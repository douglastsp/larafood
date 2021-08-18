@extends('adminlte::page')

@section('title', 'Novo Plano')

@section('content_header')
    <h1>
        Novo Plano
    </h1>

@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('plans.store') }}" class="form" method="post">
                @csrf
                <div class="form-group">
                    <label for="">Nome</label>
                    <input type="text" name="name" class="form-control" id="" placeholder="Nome:">
                </div>{{-- form-group --}}

                <div class="form-group">
                    <label for="">Preço</label>
                    <input type="text" name="price" class="form-control" id="" placeholder="Preço:">
                </div>{{-- form-group --}}

                <div class="form-group">
                    <label for="">Descrição</label>
                    <input type="text" name="description" class="form-control" id="" placeholder="Descrição:">
                </div>{{-- form-group --}}

                <div class="form-group">
                    <button type="submit" class="btn btn-outline-dark"><i class="fas fa-save"></i> Salvar</button>
                </div>{{-- form-group --}}
            </form>
        </div>{{-- body --}}
    </div>{{-- card --}}
@stop
