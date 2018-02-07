
<?php if(count($cart->getItems()) > 0): ?>

<div class="col-md-12">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4>Carrinho de Compras</h4>
            </div>

            <div class="panel-body">
                <a href="<?php echo e(route('cart.clear')); ?>" class="btn btn-danger "><i class="fa fa-trash"></i> Esvaziar</a><br><br>

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th width="5%"></th>
                            <th>Código</th>
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
                            <td><strong>Total</strong></td>
                            <td>R$ <?php echo e($cart->getTotalPrice()); ?></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>

</div>
<?php else: ?>
<h4>Sem produtos no carrinho</h4>
<?php endif; ?>
