@extends('template.dashboard')
@section('title') Dashboard | Home @endsection
@section('content')
<a href="{{ route('orders') }}" class="btn btn-default">Voltar</a><br><br>
<div class="well">
    <h3>Informações do cliente</h3>
    <p><strong>Nome: </strong>{{ $order->client->name }}</p>

    <h3>Informações dos itens da compra</h3>
    <table class="table table-bordered"> 
        <thead>  
            <tr>
                <th>Produto</th>
                <th>Preço</th>
                <th>Fornecedor</th>
                <th>Quantidade</th>
                <th>Total</th>
            </tr>
        </thead>

        <tbody>
            @foreach($order->items as $item)
            <tr>
                <td>{{ $item->name }}</td>
                <td>R$ {{ $item->unit_price }}</td>
                <td>{{ $item->provider->name }}</td>
                <td>{{ $item->pivot->qtd_itens }}</td>
                <td>R$ {{ $item->pivot->qtd_itens * $item->unit_price }}</td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>	
            <tr>
                <td><strong>Total</strong></td>
                <td>R$ {{ $order->total }}</td>
            </tr>
        </tfoot>
    </table>
    <a href="" class="btn btn-primary"><i class="fa fa-print"></i> Imprimir</a>
    <a href="" class="btn btn-success"><i class="fa fa-file"></i> Salvar</a>
</div>
@endsection