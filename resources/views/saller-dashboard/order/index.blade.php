@extends('template.saller-dashboard')
@section('title') Dashboard | Home @endsection
@section('content')

<h3>Dashboard - Pedidos - Home</h3>
<a href="{{ route('saller.dashboard') }}" class="btn btn-default">Voltar</a>
<a href="{{ route('saller.orders.create') }}" class="btn btn-success">Novo <i class="fa fa-plus"></i> </a> <br> <br>

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
                        <li><a href="{{ route('saller.orders.show', ['id' => $order->id]) }}" class="opt opt-view"><i class="fa fa-eye"></i></a></li>
                        <li><a href="{{ route('saller.orders.delete', ['id' => $order->id]) }}" class="opt opt-delete"><i class="fa fa-trash"></i></a></li>
                    </ul>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>




</div>
@endsection


@section('scripts')
<script src="{{ asset('js/jquery.dataTables.js')}}"></script>
<script src="{{ asset('js/custom-dataTables.js')}}"></script>
@endsection