
<h3>Carrinho de Compras</h3>
@if(count($cart->getItems()) > 0)
{{ Form::open(['method' => 'post', 'route' => 'sales.order.store'])}}
{{ Form::hidden('buy_date', \Carbon\Carbon::now()) }}

<div class="row" style="margin-bottom: 10px;">
    <div class="col-md-12">
        {{ Form::submit('Finalizar' , ['class' => 'btn btn-success '])}}
        {{ Form::close() }}

        <a href="{{ route('cart.print') }}" class="btn btn-primary ">Imprimir</a>
        <a href="{{ route('cart.clear') }}" class="btn btn-danger ">Cancelar</a>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
       <div class="row">
           <div class="col-md-12">
               <div class="panel panel-default">
                   <div class="panel-heading">
                       <h3>Informações da compra</h3>
                   </div>
                   <div class="panel-body">

                       @if($cart->getSaller() != null)
                           <p><strong>Vendedor: </strong>{{ $cart->getSaller()->name }}</p>
                       @endif

                       @if($cart->getClient() != null)
                           <p><strong>Cliente: </strong>{{ $cart->getClient()->name }}</p>
                       @endif
                   </div>
               </div>
           </div>
       </div>
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



@else
<div class="alert alert-info">
    Carrinho vazio
</div>
@endif
