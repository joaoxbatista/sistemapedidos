@extends('template.seller-dashboard')
@section('title') Dashboard | Home @endsection
@section('content')

<a href="{{ route('seller.orders.create') }}" class="btn btn-success">Novo <i class="fa fa-plus"></i> </a> <br> <br>

<div class="panel panel-default">
    <div class="panel-heading">
        <h4>Tabela de Pedidos</h4>
    </div>
    <div class="panel-body">
        <div class="table-responsive">
            <table id="data-table" class="table table-bordered">
                <thead>
                    <tr>
                        <th>Data da compra</th>
                        <th>Cliente</th>
                        <th>Total</th>
                        <th class="option-table-header"></th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($orders as $order)
                    <tr>
                        <td>{{ $order->buy_date }}</td>
                        <td>
                            @if($order->client)
                            {{ $order->client->name }}
                            @else
                            Sem cliente
                            @endif
                        </td>
                        <td>R$ {{ $order->total}}</td>
                        <td>

                            <ul class="option-table">
                                <li><a href="{{ route('seller.orders.show', ['id' => $order->id]) }}" class="opt opt-view"><i class="fa fa-eye"></i></a></li>
                                <li><a href="{{ route('seller.orders.delete', ['id' => $order->id]) }}" class="opt opt-delete"><i class="fa fa-trash"></i></a></li>
                            </ul>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>

@endsection


@section('scripts')
<script src="{{ asset('js/jquery.dataTables.js')}}"></script>
<script src="{{ asset('js/custom-dataTables.js')}}"></script>
@endsection