@extends('template.dashboard')
@section('title') Dashboard | Carrinho @endsection
@section('content')
@include('dashboard.order.menu')
@if(count($cart->getItems()) > 0)
<div class="col-md-12">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4>Carrinho de Compras</h4>
            </div>

            <div class="panel-body">
                <a href="{{ route('cart.clear') }}" class="btn btn-danger "><i class="fa fa-trash"></i> Esvaziar</a><br><br>

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th width="5%"></th>
                            <th>Código</th>
                            <th>Produto</th>
                            <th>Quantidade</th>
                            <th>Preço unitário</th>
                            <th>Subtotal</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach($cart->getItems() as $item)
                        <tr>
                            <td><a href="{{ route('cart.remove', ['id' => $item->product->id]) }}" class="btn btn-danger"><i class="fa fa-times"></i></a></td>
                            <td>{{$item->product->id}}</td>

                            <td>{{ $item->product->name }}</td>

                            <td>{{ $item->quantity }}</td>
                            <td>R$ {{ $item->product->unit_price }}</td>
                            <td>R$ {{ $item->price }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><strong>Total</strong></td>
                            <td>R$ {{$cart->getTotalPrice()}}</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>

</div>
@else
<h4>Sem produtos no carrinho</h4>
@endif

@endsection

@section('scripts')
<script src="{{ asset('js/jquery.dataTables.js')}}"></script>
<script src="{{ asset('js/custom-dataTables.js')}}"></script>
@endsection
