
@extends('template.seller-dashboard')
@section('title') Dashboard | Home @endsection
@section('content')
<div class="panel panel-default">
    <div class="panel-heading">
        <h4>Tabela de Produtos</h4>
    </div>

    <div class="panel-body">
        <div class="table-responsive">
            <table id="data-table" class="table table-bordered">
                <thead>
                    <tr>
                        <th width="8%">Código</th>
                        <th>Nome</th>
                        <th>Imagem</th>
                        <th>Preço</th>

                    </tr>
                </thead>

                <tbody>
                    @foreach($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td><a href="{{ route('seller.product.view', ['id' => $product->id ]) }}">{{ $product->name }}</a></td>
                        <td><img height="100px" src="{{ asset('uploads/images/products/'.$product->image) }}" alt="{{ $product->name }}"></td>
                        <td>R$ {{ $product->unit_price }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
</div>


@endsection

@section('scripts')
<script src="{{ asset('js/jquery.dataTables.js')}}"></script>
<script src="{{ asset('js/custom-dataTables.js')}}"></script>
@endsection