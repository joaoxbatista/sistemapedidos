@extends('template.simple')

@section('title') Home - SGP Hbioss @endsection
@section('styles')
	<link rel="stylesheet" type="text/css" href="{{ asset('css/home.css')}}">
@endsection

@section('content') 
   <div class="container">
        
        <div class="title-content">
        	<img src="{{ asset('imgs/cart.png') }}" class="image-center">
        	<h3 class="title-home">Sistema de Pedidos</h3>
        </div>
        <div class="home-navegation">
        	<nav>
	        	<li><a href="">Documentação</a></li>
	        	<li><a href="">Contato</a></li>
	        	<li><a href="{{ route('dashboard.home')}}">Administrador</a></li>
	        	<li><a href="{{ route('seller.login')}}">Vendedor</a></li>
	        </nav>
        </div>
        
   </div>
@endsection