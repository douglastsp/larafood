@extends('site.layout.app')

@section('content')
    <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
        <h1 class="display-4">Planos</h1>
        <p class="lead">Escolha o melhor plano para você!</p>
    </div>

    <div class="container">
        <div class="card-deck mb-3 text-center d-flex justify-content-center align-items-start">
            @foreach ($plans as $plan)
                <div class="card m-4 box-shadow">
                    <div class="card-header">
                        <h4 class="my-0 font-weight-normal">{{ $plan->name }}</h4>
                    </div>
                    <div class="card-body">
                        <h1 class="card-title pricing-card-title">{{ number_format($plan->price, 2, ',', '.') }} 
                            <small class="text-muted">/Mês </small>
                        </h1>
                        <div class="d-flex justify-content-center">
                            <div class="w-50">
                                <ul class="list-unstyled mt-3 mb-4">
                                    @foreach ($plan->details as $detail)
                                        <li>{{ $detail->name }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <a href="#" class="btn btn-lg btn-block btn-outline-primary">Assinar</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>    
@endsection

