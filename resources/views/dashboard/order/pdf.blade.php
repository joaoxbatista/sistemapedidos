@extends('template.pdf')

@section('content')
<h3>Informações do Cliente</h3>
<p><strong> CPF: </strong> {{ $order->client->name }}</p>
<p><strong> Nome: </strong> {{ $order->client->name }}</p>
<p><strong> Endereço: </strong>{{ $order->client->city }}/{{ $order->client->district }}/{{ $order->client->street }} - {{ $order->client->cep }}</p>
<hr>
<h3>Informações do Pedido</h3>
<table>
    <thead>
        <tr>
            <th>Produto</th>
            <th>Preço unitário</th>
            <th>Quantidade</th>
            <th>Subtotal</th>
        </tr>
    </thead>

    <tbody>
        @foreach($order->items as $item)
        <tr>
            <td>{{ $item->name }}</td>
            <td>R$ {{ $item->unit_price }}</td>
            <td>{{ $item->pivot->qtd_itens }}</td>
            <td>R$ {{ $item->pivot->total }} </td>
        </tr>
        @endforeach
    </tbody>
    
    <tfoot>
        <tr>
            <td></td>
            <td></td>
            <td><strong>Total</strong></td>
            <td class="total">R$ {{ $order->total }}</td>
        </tr>
    </tfoot>
</table>


@endsection