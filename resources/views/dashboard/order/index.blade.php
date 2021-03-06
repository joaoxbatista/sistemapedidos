@extends('template.dashboard')
@section('title') Dashboard | Home @endsection
@section('content')

<a href="{{ route('dashboard.home') }}" class="btn btn-default">Voltar</a>
<a href="{{ route('orders.create') }}" class="btn btn-success">Novo <i class="fa fa-plus"></i> </a> <br> <br>

<div class="panel panel-default">
    <div class="panel-heading">
        <h4>Tabela de pedidos</h4>
    </div>
    <div class="panel-body">
        <div class="table-responsive">
            <table id="data-table" class="table table-bordered">

                <thead>
                <tr>
                    <th width="40px">Código</th>
                    <th>Data da compra</th>
                    <th>Cliente</th>
                    <th>Total</th>
                    <th width="100px"></th>
                </tr>
                </thead>

                <tbody>
                @foreach($orders as $order)
                    <tr>
                        <td style="color: white; font-weight: bold;"
                        @if($order->status)
                            class="label-success"
                        @else
                            class="label-danger"
                        @endif
                        >
                            {{ $order->id }}
                        </td>
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
                                <li><a href="/dashboard/orders/{{$order->id}}" class="opt opt-view"><i class="fa fa-eye"></i></a></li>
                                {{--<li><a href="/dashboard/orders/{{$order->id}}/edit" class="opt opt-edit"><i class="fa fa-pencil"></i></a></li>--}}
                                <li><a href="/dashboard/orders/{{$order->id}}/delete" class="opt opt-delete"><i class="fa fa-trash"></i></a></li>
                            </ul>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection


@section('scripts')
<script src="{{ asset('js/jquery.dataTables.js')}}"></script>
<script src="{{ asset('js/custom-dataTables.js')}}"></script>
@endsection