@extends('template.dashboard')
@section('title') Dashboard | Home @endsection
@section('content')

<a href="{{ route('orders') }}" class="btn btn-default">Voltar</a><br><br>

<!-- Tabela de produtos -->
<div class="panel panel-default">
    <div class="panel-heading">
        <h4>Tabela de produtos</h4>
    </div>
    <div class="panel-body">
        <div class="table-responsive">
            <table id="products" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>Código</th>
                    <th>Nome</th>
                    <th>Quantidade</th>
                </tr>
                </thead>

                <!-- <tbody>
                @foreach($products as $product)
                    <tr>
                        <td>{{ $product->id }} </td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->unit_price }}</td>
                        <td>{{ $product->provider->name }}</td>
                        {{ Form::open(['method' => 'post', 'route' => 'cart.add'])}}
                        <td>
                            {{ Form::hidden('product_id', $product->id, ['class' => 'form-control'])}}
                            {{ Form::text('quantity', 1, ['class' => 'form-control'])}}
                        </td>
                        <td>
                            <button type="sumbit" class="btn btn-success" style="float: right"><i class="fa fa-plus"></i></button>
                        </td>
                        {{ Form::close()}}
                    </tr>
                @endforeach
                </tbody> -->
            </table>
        </div>
    </div>
</div><!--/ Tabela de produtos -->

@include('dashboard.cart.cart')

@endsection


@section('scripts')
<script src="{{ asset('js/jquery.dataTables.js')}}"></script>
<script>
    $(function(){
        //Pega todos os produtos
        var products = $('#products').DataTable( {
            "ajax": "/api/products",
            "columns": [
                { "data": "id", 
                    "fnCreatedCell": function (nTd, sData, oData, iRow, iCol) {
                    $(nTd).html("<a href='api/add-to-cart/"+oData.id+"'>"+oData.name+"</a>");
                    }
                },
                { "data": "name" },
                { "data": "quantity" },
            ]
        } );

        $('.odd').click(
            function()
            {
                alert('clicou');
            }
        );
    });
</script>
<script src="{{ asset('js/custom-dataTables.js')}}"></script>
@endsection