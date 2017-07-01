
<h3>Carrinho de Compras</h3>
@if(count($cart->getItems()) > 0)
{{ Form::open(['method' => 'post', 'route' => 'orders.store'])}}

<div class="row">
    <div class="col-md-3 form-group">
        {{ Form::label('client_id', 'Selecione um cliente')}}
        {{ Form::select('client_id',  array_merge([0 => 'Selecione um cliente'],$clients), 0, ['class' => 'form-control'])}}
        {{ Form::hidden('buy_date', \Carbon\Carbon::now()) }}
    </div>
</div>	

<div class="row">
    <div class="col-md-12">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th width="5%"></th>
                    <th>Produto</th>
                    <th width="5%">Quantidade</th>
                    <th width="5%">Preço unitário</th>
                    <th width="10%">Subtotal</th>

                </tr>
            </thead>
            <tbody>
                @foreach($cart->getItems() as $item)
                <tr>
                    <td><a href="{{ route('cart.remove', ['id' => $item->product->id]) }}" class="btn btn-danger"><i class="fa fa-times"></i></a></td>
                    <td>{{ $item->product->name }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>R$ {{ $item->product->unit_price }}</td>
                    <td>R$ {{ $item->price }}</td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td><strong>Total</strong></td>
                    <td>R$ {{$cart->getTotalPrice()}}</td>
                </tr>
            </tfoot>
        </table>
    </div>
</div>

<div class="row">
    <div class="col-md-1">
        {{ Form::submit('Finalizar' , ['class' => 'btn btn-success'])}}
    </div>

</div>
{{ Form::close() }}
@else
<div class="alert alert-info">
    Carrinho vazio
</div>
@endif
