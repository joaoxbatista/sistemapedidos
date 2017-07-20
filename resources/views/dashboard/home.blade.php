@extends('template.dashboard')
@section('title') Dashboard | Home @endsection
@section('content')

    <div class="row">
        <h3>Informações do seu negócio</h3>
        <div class="col-md-3 well">
            <p>Produtos <span class="label label-primary">{{ App\Models\Product::count() }}</span></p>
        </div>

        <div class="col-md-3 well">
            <p>Fornecedores <span class="label label-primary">{{ App\Models\Provider::count() }}</span></p>
        </div>

        <div class="col-md-3 well">
            <p>Clientes <span class="label label-primary">{{ App\Models\Client::count() }}</span></p>
        </div>

        <div class="col-md-3 well">
            <p>Pedidos <span class="label label-primary">{{ App\Models\Order::count() }}</span></p>
        </div>

        <div class="col-md-3 well">
            <p>Itens vendidos <span class="label label-primary">{{ App\Models\Order::sellerItems() }}</span></p>
        </div>

        <div class="col-md-3 well">
            <p>Saldo de vendas <span class="label label-primary">{{ App\Models\Order::balance() }}</span></p>
        </div>

        <div class="col-md-3 well">
            <p>Vendedores <span class="label label-primary">{{ App\Models\Seller::count() }}</span></p>
        </div>

    </div>


@endsection