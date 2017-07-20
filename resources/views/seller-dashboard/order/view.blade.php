@extends('template.seller-dashboard')
@section('title') Dashboard | Home @endsection
@section('content')

<a href="{{ route('seller.orders') }}" class="btn btn-default">Voltar</a><br><br>

@if($order->client)
<div class="panel panel-default">
    <div class="panel-heading">
        <h4>Informações do cliente</h4>
    </div>

    <div class="panel-body">
        <p><strong>Código: </strong>{{ $order->client->id }}</p>
        <p><strong>Nome: </strong>{{ $order->client->name }}</p>
        <p><strong>Limite de crédito: </strong>{{ is_null($order->client->limit_credit) ? "Sem limite" : $order->client->limit_credit}}</p>
    </div>
</div>
@endif

<div class="panel panel-default">
    <div class="panel-heading">
        <h4>Informações da Compra</h4>
    </div>
    <div class="panel-body">
        <p><strong>Data da compra:</strong> {{ $order->buy_date }}</p>
        @if($order->status)
        <p><strong>Status:</strong> <span class="label-success label">Pagamento realizado.</span></p>
        @else
        <p><strong>Status:</strong> <span class="label-danger label">Data de vencimento {{ $order->due_date }}</span></p>
        @endif
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Produto</th>
                    <th>Preço</th>
                    <th>Fornecedor</th>
                    <th>Quantidade</th>
                    <th>Subtotal</th>
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
                    <td></td>
                    <td></td>
                    <td></td>
                    <td><strong>Total</strong></td>
                    <td>R$ {{ $order->total }}</td>
                </tr>
            </tfoot>
        </table>
        <a href="{{ route('seller.orders.print', ['id' => $order->id]) }}" class="btn btn-primary"><i class="fa fa-print"></i> Imprimir</a>
        <a href="{{ route('seller.orders.download', ['id' => $order->id]) }}" class="btn btn-success"><i class="fa fa-file"></i> Salvar</a>
         @if(!$order->status)
            <a href="{{ route('seller.orders.confirm', ['id' => $order->id]) }}" class="btn btn-success"><i class="fa fa-check"></i> Confirmar</a>
        @endif

    </div>
</div>
@endsection