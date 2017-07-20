
@if(count($cart->getItems()) > 0)

    <div class="col-md-12">
        <div class="row" style="margin-top: 10px;">
            @if($cart->getSeller() != null or $cart->getClient() != null)
                <div class="panel panel-default">

                    <div class="panel-heading">
                        <h3>Informações da compra</h3>
                    </div>

                    <div class="panel-body">



                        @if($cart->getSeller() != null)
                            <p><strong>Vendedor: </strong>{{ $cart->getSeller()->name }}</p>
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
                    <h4>Carrinho de Compras</h4>
                </div>

                <div class="panel-body">
                    {{ Form::open(['method' => 'post', 'route' => 'sales.order.store'])}}

                    <div class="col-md-12" style="margin-bottom: 10px">
                        {{ Form::hidden('buy_date', \Carbon\Carbon::now()) }}

                        {{ Form::submit('Finalizar' , ['class' => 'btn btn-success '])}}
                        <a href="{{ route('cart.clear') }}" class="btn btn-danger ">Limpar</a>

                    </div>

                    @if($cart->getClient() != null)
                        <div class="col-md-4">
                            <!-- Adicionar Prazo -->
                            <div class="form-group">
                                {{ Form::label('due_date', 'Selecione um prazo') }}
                                {{ Form::date('due_date', null, ['class' => 'form-control']) }}
                            </div>
                        </div><!-- Adicionar Prazo -->
                    @endif
                    {{ Form::close() }}


                    <!-- Adicionar Cliente -->
                    @if(count($clients) > 0)

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

                    @endif



                    <!-- Lista de produtos -->
                    <div class="col-md-12">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th width="5%"></th>
                                <th>Código</th>
                                <th>Imagem</th>
                                <th>Produto</th>
                                <th>Quantidade</th>
                                <th>Preço unitário</th>
                                <th>Subtotal</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($cart->getItems() as $item)
                                <tr>
                                    <td><a href="{{ route('cart.remove', ['id' => $item->product->id]) }}" class="btn btn-danger"><i class="fa fa-times"></i></a></td>
                                    <td>{{$item->product->id}}</td>
                                    @if($item->product->image != null)
                                        <td><img width="60px" src="{{ asset('uploads/images/products/'.$item->product->image) }}" alt=""></td>
                                    @else
                                        <td><img width="60px" src="{{ asset('uploads/images/products/no-image.png') }}" alt=""></td>
                                    @endif
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
                                <td></td>
                                <td></td>
                                <td><strong>Total</strong></td>
                                <td>R$ {{$cart->getTotalPrice()}}</td>
                            </tr>
                            </tfoot>
                        </table>
                    </div> <!-- Lista de produtos -->
                </div>
            </div>
        </div>

    </div>

@endif
