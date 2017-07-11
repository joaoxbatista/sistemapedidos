@extends('template.bootstrap')
@section('title') Produtos da Loja @endsection
@section('content')
@foreach($products as $product)
    <div class="container">
        <div class="col-md-3">

            <img src="{{ asset('uploads/images/products/'.$product->image) }}" alt="{{ $product->image }}">
            <h3>{{ $product->name }}</h3>
            <span clas="label-default">R$ {{$product->unit_price}}</span>
            <p style="word-wrap: break-word;">{{$product->desc}}</p>
        </div>
        {{ $products->links() }}
    </div>

@endforeach
@endsection