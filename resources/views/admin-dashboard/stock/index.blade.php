@extends('templates.admin-dashboard')
@section('title') Estoque @endsection
@section('styles') 

@endsection

@section('content')
<a href="{{ route('admin-dashboard.providers.index') }}" class="btn btn-success"><i class="pe-7s-box2"></i> fornecedores</a>

<a href="{{ route('admin-dashboard.categories.index') }}" class="btn btn-success"><i class="pe-7s-ticket"></i> categorias</a>

<a href="{{ route('admin-dashboard.products.index') }}" class="btn btn-success"><i class="pe-7s-shopbag"></i> produtos</a>

<a href="{{ route('admin-dashboard.orders.index') }}" class="btn btn-success"><i class="pe-7s-cart"></i> pedidos</a>
@endsection
