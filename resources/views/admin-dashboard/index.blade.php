@extends('templates.admin-dashboard')
@section('title') Dashboard @endsection
@section('content')
<div class="container-fluid">
    <div class="col-md-2 card">
        <h3><i class="pe-7s-ticket"></i> {{ App\Models\Product::count() }}</h3>
        <p>produtos</p>
    </div>

    <div class="col-md-2 card">
        <h3><i class="pe-7s-box2"></i> {{ App\Models\Provider::count() }} </h3>
        <p>fornecedores</p>
    </div>

    <div class="col-md-2 card">
        <h3><i class="pe-7s-users"></i> {{ App\Models\Client::count() }} </h3>
        <p>clientes</p>
    </div>

    <div class="col-md-2 card">
        <h3><i class="pe-7s-cart"></i> {{ App\Models\Order::count() }} </h3>
        <p>pedidos</p>
    </div>

    <div class="col-md-2 card">
        <h3><i class="pe-7s-cash"></i> {{ App\Models\Order::balance() }} </h3>
        <p>saldo</p>
    </div>

    <div class="col-md-2 card">
        <h3><i class="pe-7s-id"></i> {{ App\Models\Seller::count() }} </h3>
        <p>funcionários</p>
    </div>
</div>
@endsection
@section('scripts') 

@endsection
