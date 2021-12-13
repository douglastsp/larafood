@extends('adminlte::page')

@section('title', 'Novo Mesa')

@section('content_header')
    <h1>
        Nova Mesa
    </h1>

@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('tables.store') }}" class="form" method="post">
                @csrf
                @include('admin.pages.tables._partials.form')
            </form>
        </div>{{-- body --}}
    </div>{{-- card --}}
@stop
