@extends('template.bootstrap')
@section('title') Produtos da Loja @endsection
@section('content')
<div class="container">
	<div class="row" style="margin-top: 50px;">
		@foreach($products as $product)
		        <div class="col-md-3">
		            @if($product->image != null)
		            	<img class="img-rounded" src="{{ asset('uploads/images/products/'.$product->image) }}" alt="{{ $product->image }}">
		            @else
		            	<img width="240" height="240" src="{{ asset('uploads/images/products/no-image.png') }}" alt="sem imagem">
		            @endif
		            
		            <h4>{{ $product->name }}</h4>
		            <p class="label label-success">R$ {{$product->unit_price}}</p><br><br>
		            <p style="word-wrap: break-word;">{{ Str::words($product->desc, 14, '...') }}</p>
		            <a class="btn btn-primary" href="{{ route('products.show', ['id' => $product->id]) }}">Visualizar</a>
		        </div>
		@endforeach
	
	</div>
	{{ $products->links() }}
</div>


@endsection