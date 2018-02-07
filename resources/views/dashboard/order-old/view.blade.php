@extends('template.dashboard')
@section('title') Dashboard | Home @endsection
@section('content')
<a href="{{ route('orders') }}" class="btn btn-default">Voltar</a><br><br>

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

@if($order->seller)
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4>Informações do vendedor</h4>
        </div>

        <div class="panel-body">
            <img class="img-circle" width="70" src="{{ asset($order->seller->image) }}"></img>
            <p><strong>Código: </strong>{{ $order->seller->id }}</p>
            <p><strong>Nome: </strong>{{ $order->seller->name }}</p>
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

        @elseif(!$order->status and !is_null($order->due_date))
            <p><strong>Status:</strong> <span class="label-danger label">Parcelas pendentes</span></p>
        @else
            <p><strong>Data de pagamento:</strong> <span class="label-danger label">{{ $order->due_date }} </span></p>
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
        <a href="{{ route('orders.print', ['id' => $order->id]) }}" class="btn btn-primary"><i class="fa fa-print"></i> Imprimir</a>
        <a href="{{ route('orders.download', ['id' => $order->id]) }}" class="btn btn-info"><i class="fa fa-file"></i> Salvar</a>

    </div>
</div>

@if($order->type == 'parcels')
  
    <div class="panel panel-default">   
        <div class="panel-heading"> 
            <h4>Parcelas</h4>
        </div>
        <div class="panel-body"> 

        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Código</th>
                <th>Valor</th>
                <th>Data de Pagamento</th>
                <th width="60px"></th>
            </tr>
            </thead>

            <tbody>
            @foreach($order->parcels as $parcel)
                <tr>
                    <td>{{ $parcel->id }}</td>
                    <td>{{ $parcel->value }}</td>
                    <td>{{ $parcel->pay_date }}</td>
                    <td>

                    

                    @if(!$parcel->status)
                        <a href="{{ route('checks.create', ['id' => $parcel->id])}}" class="btn btn-success">Adicionar Cheque</a>
                        <a href="{{ route('parcel.confirm', ['id' => $parcel->id]) }}" class="btn btn-success">Pagar</a>
                    @else
                        Pagamento confirmado
                    @endif
                    </td>
                   
                </tr>
            @endforeach
            </tbody>
                
        </div>
    </div>
@endif
@endsection