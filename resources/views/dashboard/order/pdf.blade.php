@extends('template.pdf')

@section('content')

    <section>
        <h3>Informações da Compra</h3>
        <table>
            <tbody>
            <tr>
                <td width="10%"><strong>Código</strong></td>
                <td>{{ $order->id }}</td>
            </tr>

            <tr>
                <td width="10%"><strong>Data de compra</strong></td>
                <td>{{ $order->buy_date }}</td>
            </tr>

            <tr>
                <td width="10%"><strong>Total a ser pago</strong></td>
                <td>R$ {{ $order->total }}</td>
            </tr>

            </tbody>
        </table>
    </section>

    @if($order->saller)
        <section>
            <h3>Informações do Vendedor</h3>
            <table>
                <tbody>

                <tr>
                    <td width="10%"><strong>Código</strong></td>
                    <td>{{ $order->saller->id }}</td>
                </tr>

                <tr>
                    <td width="10%"><strong>Nome</strong></td>
                    <td>{{ $order->saller->name }}</td>
                </tr>

                </tbody>
            </table>
        </section>
    @endif

    @if($order->cliente)
        <section>
            <h3>Informações do Cliente</h3>
            <table>
                <tbody>

                <tr>
                    <td width="10%"><strong>CPF</strong></td>
                    <td>{{ $order->client->cpf }}</td>
                </tr>

                <tr>
                    <td width="10%"><strong>Nome</strong></td>
                    <td>{{ $order->client->name }}</td>
                </tr>

                <tr>
                    <td width="10%"><strong>Endereço</strong></td>
                    <td>CEP: {{ $order->client->cep }}; Rua: {{ $order->client->street }}; Bairro: {{ $order->client->district }}; Cidade: {{ $order->client->city }}; Estado: {{ $order->client->state }}. </td>
                </tr>

                </tbody>
            </table>
        </section>
    @endif

    <section>
        <h3>Informações dos Items</h3>
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
    </section>


@endsection