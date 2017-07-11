
@extends('template.saller-dashboard')
@section('title') Dashboard | Home @endsection
@section('styles')

@endsection

@section('content')

    <h3>Dashboard - Produtos</h3>

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
                <td><a href="{{ route('saller.product.view', ['id' => $product->id ]) }}">{{ $product->name }}</a></td>
                <td><img height="100px" src="{{ asset($product->image) }}" alt="{{ $product->name }}"></td>
                <td>R$ {{ $product->unit_price }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>


@endsection

@section('scripts')
    <script src="{{ asset('js/jquery.dataTables.js')}}"></script>
    <script src="{{ asset('js/custom-dataTables.js')}}"></script>
@endsection