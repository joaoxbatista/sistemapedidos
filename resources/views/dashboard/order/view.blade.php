@extends('template.dashboard')
@section('title') Dashboard | Home @endsection
@section('content')
<a href="/dashboard/products/" class="btn btn-default">Voltar</a><br><br>
<div class="well">
	<p><strong>Nome: </strong>{{ $order->client->name }}</p>
	<p><strong>Nome: </strong>{{ $order->items }}</p>
</div>
@endsection