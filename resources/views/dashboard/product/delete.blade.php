@extends('template.dashboard')
@section('title') Dashboard | Home @endsection
@section('content')
<a href="{{ route('products') }}" class="btn btn-default">Voltar</a><br><br>

    <div class="panel panel-danger">
        <div class="panel-heading">
            <h4>Apagar registro</h4>
        </div>
        <div class="panel-body">
            <p>Tem certeza que deseja remover o vendedor com as seguinte informações ?</p>

            <img width="180px" src="{{ asset('uploads/images/products/'.$product->image) }}" alt="{{ $product->name }}">
            <p><strong>Código: </strong>{{ $product->id }}</p>
            <p><strong>Nome: </strong>{{ $product->name }}</p>
            <p><strong>Fornecedor: </strong>{{ $product->provider->name }}</p>
            <p><strong>Preço unitário: </strong>{{ $product->unit_price }}</p>
            <p><strong>Peso: </strong>{{ $product->weight }}Kg</p>
            <p><strong>Descrição: </strong>{{ $product->desc }}</p>

            {{ Form::open(['method' => 'post', 'route' => 'products.destroy'])}}
            {{ Form::hidden('id', $product->id)}}
            {{ Form::submit('Deletar', ['class' => 'btn btn-danger'])}}
            {{ Form::close()}}
        </div>
    </div>
@endsection