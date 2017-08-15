@extends('template.dashboard')
@section('title') Dashboard | Carrinho @endsection
@section('content')
@include('dashboard.order.menu')
@if(count($cart->getItems()) > 0)
<div class="col-md-12">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4>Informações da cliente</h4>
            </div>
            <div class="panel-body">
                @if(!is_null($cart->getClient()))
                <a class="btn btn-danger" href="{{ route('cart.remove.client') }}"> Remover</a> <br><br>
                @if($cart->getClient() != null)
                <p><strong>Cliente: </strong>{{ $cart->getClient()->name }}</p>

                @if($cart->getClient()->limit_credit != null)
                <p><strong>Limite de Crédito: </strong>{{ $cart->getClient()->limit_credit }}</p>
                @endif

                @endif

                @else
                <div class="col-md-3">
                    {{ Form::open(['method' => 'post', 'route' => 'cart.add.client'])}}
                    <div class="form-group">
                        {{ Form::label('client_id', 'Insira o código do cliente') }}
                        {{ Form::text('client_id', '', ['class' => 'form-control']) }}
                    </div>
                    <div style="margin-top: -10px; margin-bottom: 10px;">
                        {{ Form::submit('Adicionar', ['class' => 'btn btn-primary']) }}
                    </div>
                    {{ Form::close()}}
                </div>
                @endif
            </div>
        </div>
    </div>

</div>
@else
    <h4>É necessário que exitam produtos no carrinho.</h4>
@endif
@endsection

@section('scripts')
<script src="{{ asset('js/jquery.dataTables.js')}}"></script>
<script src="{{ asset('js/custom-dataTables.js')}}"></script>
@endsection
