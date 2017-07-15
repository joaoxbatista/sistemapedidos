@extends('template.dashboard')
@section('title') Dashboard | Home @endsection
@section('content')
<a href="{{ route('orders') }}" class="btn btn-default">Voltar</a><br><br>

    <div class="panel panel-danger">
        <div class="panel-heading">
            <h4>Apagar registro</h4>
        </div>
        <div class="panel-body">
            <p>Tem certeza que deseja remover o vendedor com as seguinte informações ?</p>
            <p><strong>Código: </strong>{{ $order->id }}</p>
            <p><strong>Código: </strong>{{ $order->buy_date }}</p>

            {{ Form::open(['method' => 'post', 'route' => 'orders.destroy'])}}
            {{ Form::hidden('id', $order->id)}}
            {{ Form::submit('Deletear', ['class' => 'btn btn-danger'])}}
            {{ Form::close()}}
        </div>
    </div>
@endsection