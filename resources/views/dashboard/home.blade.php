@extends('template.simple')
@section('title') Dashboard | Home @endsection
@section('content')
	<div class="container">
        <div class="col-md-6">
            <h3>Bem-vindo ao sistema de gerênciamento de pedidos da Hbioss!</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
            cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
            proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        </div>

        <div class="col-md-6">
            <nav class="nav nav-pills nav-stacked">

                <li><a href="dashboard/providers">Fornecedores</a></li>
                <li><a href="dashboard/products">Podutos</a></li>
                <li><a href="dashboard/clients">Clientes</a></li>
                <li><a href="dashboard/orders">Pedidos</a></li>
            </nav>
        </div>
   </div>
@endsection