
<?php if(count($cart->getItems()) > 0): ?>

    <div class="col-md-12">
        <div class="row" style="margin-top: 10px;">
            <?php if($cart->getSeller() != null or $cart->getClient() != null): ?>
                <div class="panel panel-default">

                    <div class="panel-heading">
                        <h3>Informações da compra</h3>
                    </div>

                    <div class="panel-body">



                        <?php if($cart->getSeller() != null): ?>
                            <p><strong>Vendedor: </strong><?php echo e($cart->getSeller()->name); ?></p>
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
                    <h4>Carrinho de Compras</h4>
                </div>

                <div class="panel-body">
                    <?php echo e(Form::open(['method' => 'post', 'route' => 'sales.order.store'])); ?>


                    <div class="col-md-12" style="margin-bottom: 10px">
                        <?php echo e(Form::hidden('buy_date', \Carbon\Carbon::now())); ?>


                        <?php echo e(Form::submit('Finalizar' , ['class' => 'btn btn-success '])); ?>

                        <a href="<?php echo e(route('cart.clear')); ?>" class="btn btn-danger ">Limpar</a>

                    </div>

                    <?php if($cart->getClient() != null): ?>
                        <div class="col-md-4">
                            <!-- Adicionar Prazo -->
                            <div class="form-group">
                                <?php echo e(Form::label('due_date', 'Selecione um prazo')); ?>

                                <?php echo e(Form::date('due_date', null, ['class' => 'form-control'])); ?>

                            </div>
                        </div><!-- Adicionar Prazo -->
                    <?php endif; ?>
                    <?php echo e(Form::close()); ?>



                    <!-- Adicionar Cliente -->
                    <?php if(count($clients) > 0): ?>

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

                    <?php endif; ?>



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
                            <?php $__currentLoopData = $cart->getItems(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><a href="<?php echo e(route('cart.remove', ['id' => $item->product->id])); ?>" class="btn btn-danger"><i class="fa fa-times"></i></a></td>
                                    <td><?php echo e($item->product->id); ?></td>
                                    <?php if($item->product->image != null): ?>
                                        <td><img width="60px" src="<?php echo e(asset('uploads/images/products/'.$item->product->image)); ?>" alt=""></td>
                                    <?php else: ?>
                                        <td><img width="60px" src="<?php echo e(asset('uploads/images/products/no-image.png')); ?>" alt=""></td>
                                    <?php endif; ?>
                                    <td><?php echo e($item->product->name); ?></td>

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
                                <td></td>
                                <td><strong>Total</strong></td>
                                <td>R$ <?php echo e($cart->getTotalPrice()); ?></td>
                            </tr>
                            </tfoot>
                        </table>
                    </div> <!-- Lista de produtos -->
                </div>
            </div>
        </div>

    </div>

<?php endif; ?>
