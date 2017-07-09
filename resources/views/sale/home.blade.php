@extends('template.simple')

@section('content')
    <div class="container">
        <h3>Entrada de pedidos</h3>
        <div class="row">

            <div class=" col-md-2">
                {{ Form::open(['method' => 'post', 'route' => 'sales.add.product']) }}
                <div class="row">
                    <div class="form-group col-md-12">
                        {{ Form::label('product_id', 'Código do produto') }}
                        {{ Form::text('product_id', null, ['class' => 'form-control']) }}
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-12">
                        {{ Form::label('quantity', 'Quantidade') }}
                        {{ Form::text('quantity', null, ['class' => 'form-control']) }}
                    </div>
                </div>


                {{ Form::button('Adicionar',['class' => 'btn btn-primary', 'type' => 'submit']) }}

                {{ Form::close() }}
            </div>

            <div class="col-md-2">
                {{ Form::open(['method' => 'post', 'route' => 'sales.add.saller']) }}
                <div class="row">
                    <div class="col-md-12 form-group">
                        {{ Form::label('saller_id', 'Código do Vendedor') }}
                        {{ Form::text('saller_id', null, ['class' => 'form-control']) }}

                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        {{ Form::button('Adicionar',['class' => 'btn btn-primary', 'type' => 'submit']) }}
                    </div>
                </div>

                {{ Form::close() }}

            </div>

            <div class="col-md-2">
                {{ Form::open(['method' => 'post', 'route' => 'sales.add.client']) }}
                <div class="row">
                    <div class="col-md-12 form-group">
                        {{ Form::label('client_id', 'Código do Cliente') }}
                        {{ Form::text('client_id', null, ['class' => 'form-control']) }}

                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        {{ Form::button('Adicionar',['class' => 'btn btn-primary', 'type' => 'submit']) }}
                    </div>
                </div>

                {{ Form::close() }}

            </div>




        </div>

        @include('dashboard.cart.cart')

    </div>
@endsection