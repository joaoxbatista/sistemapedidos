
<?php if(count($cart->getItems()) > 0): ?>

    <div class="col-md-12">
        <div class="row" style="margin-top: 10px;">
            <?php if($cart->getSaller() != null or $cart->getClient() != null): ?>
            <div class="panel panel-default">

                <div class="panel-heading">
                    <h3>Informações da compra</h3>
                </div>

                <div class="panel-body">



                    <?php if($cart->getSaller() != null): ?>
                        <p><strong>Vendedor: </strong><?php echo e($cart->getSaller()->name); ?></p>
                    <?php endif; ?>

                    <?php if($cart->getClient() != null): ?>
                        <p><strong>Cliente: </strong><?php echo e($cart->getClient()->name); ?></p>

                        <?php if($cart->getClient()->limit_credit != null): ?>
                            <p><strong>Limite de Crédito: </strong><?php echo e($cart->getClient()->limit_credit); ?></p>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>
            </div>
            <?php endif; ?>
        </div>

        <div class="row" style="margin-top: 10px;">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4><i class="fa fa-shopping-cart"></i> Carrinho de Compras</h4>
                </div>

                <div class="panel-body">
                    <div class="col-md-12" style="margin-bottom: 20px">
                        <?php echo e(Form::open(['method' => 'post', 'route' => 'sales.order.store'])); ?>

                        <?php echo e(Form::hidden('buy_date', \Carbon\Carbon::now())); ?>

                        <?php echo e(Form::submit('Finalizar' , ['class' => 'btn btn-success '])); ?>

                        <a href="<?php echo e(route('cart.clear')); ?>" class="btn btn-danger ">Limpar</a>
                        <?php echo e(Form::close()); ?>

                    </div>

                    <!-- Adicionar Cliente -->
                    <div class="col-md-4">
                        <?php echo e(Form::open(['method' => 'post', 'route' => 'cart.add.client'])); ?>

                        <div class="form-group">
                            <?php echo e(Form::label('client_id', 'Slecione um cliente')); ?>

                            <?php echo e(Form::select('client_id', $clients, null ,['class' => 'form-control'])); ?>

                        </div>
                        <div style="margin-top: -10px; margin-bottom: 10px;">
                            <?php echo e(Form::submit('Adicionar', ['class' => 'btn btn-primary'])); ?>

                        </div>
                        <?php echo e(Form::close()); ?>

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
                            <?php $__currentLoopData = $cart->getItems(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><a href="<?php echo e(route('cart.remove', ['id' => $item->product->id])); ?>" class="btn btn-danger"><i class="fa fa-times"></i></a></td>
                                    <td><?php echo e($item->product->name); ?></td>
                                    <?php if($item->product->name != null): ?>
                                        <td><img width="60px" src="<?php echo e(asset('uploads/images/products/'.$item->product->image)); ?>" alt=""></td>
                                    <?php else: ?>
                                        <td><img width="60px" src="<?php echo e(asset('uploads/images/products/no-image.png')); ?>" alt=""></td>
                                    <?php endif; ?>
                                    <td><?php echo e($item->quantity); ?></td>
                                    <td>R$ <?php echo e($item->product->unit_price); ?></td>
                                    <td>R$ <?php echo e($item->price); ?></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                            <tfoot>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td><strong>Total</strong></td>
                                <td>R$ <?php echo e($cart->getTotalPrice()); ?></td>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>

<?php endif; ?>
