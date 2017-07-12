
@if(count($cart->getItems()) > 0)

    <div class="col-md-12">
        <div class="row" style="margin-top: 10px;">
            @if($cart->getSaller() != null or $cart->getClient() != null)
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

                        @if($cart->getClient()->limit_credit != null)
                            <p><strong>Limite de Crédito: </strong>{{ $cart->getClient()->limit_credit }}</p>
                        @endif
                    @endif
                </div>
            </div>
            @endif
        </div>

        <div class="row" style="margin-top: 10px;">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4><i class="fa fa-shopping-cart"></i> Carrinho de Compras</h4>
                </div>

                <div class="panel-body">
                    <div class="col-md-12" style="margin-bottom: 20px">
                        {{ Form::open(['method' => 'post', 'route' => 'sales.order.store'])}}
                        {{ Form::hidden('buy_date', \Carbon\Carbon::now()) }}
                        {{ Form::submit('Finalizar' , ['class' => 'btn btn-success '])}}
                        <a href="{{ route('cart.clear') }}" class="btn btn-danger ">Limpar</a>
                        {{ Form::close() }}
                    </div>

                    <!-- Adicionar Cliente -->
                    <div class="col-md-4">
                        {{ Form::open(['method' => 'post', 'route' => 'cart.add.client']) }}
                        <div class="form-group">
                            {{ Form::label('client_id', 'Slecione um cliente') }}
                            {{ Form::select('client_id', $clients, null ,['class' => 'form-control']) }}
                        </div>
                        <div style="margin-top: -10px; margin-bottom: 10px;">
                            {{ Form::submit('Adicionar', ['class' => 'btn btn-primary']) }}
                        </div>
                        {{ Form::close() }}
                    </div><!-- Adicionar Cliente -->



                    <div class="col-md-12">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th width="5%"></th>
                                <th>Produto</th>
                                <th>Imagem</th>
                                <th>Quantidade</th>
                                <th>Preço unitário</th>
                                <th>Subtotal</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($cart->getItems() as $item)
                                <tr>
                                    <td><a href="{{ route('cart.remove', ['id' => $item->product->id]) }}" class="btn btn-danger"><i class="fa fa-times"></i></a></td>
                                    <td>{{ $item->product->name }}</td>
                                    @if($item->product->name != null)
                                        <td><img width="60px" src="{{ asset('uploads/images/products/'.$item->product->image) }}" alt=""></td>
                                    @else
                                        <td><img width="60px" src="{{ asset('uploads/images/products/no-image.png') }}" alt=""></td>
                                    @endif
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
                                <td></td>
                                <td><strong>Total</strong></td>
                                <td>R$ {{$cart->getTotalPrice()}}</td>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endif
