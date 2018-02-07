<?php $__env->startSection('title'); ?> Dashboard | Carrinho <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php echo $__env->make('dashboard.order.menu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
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

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script src="<?php echo e(asset('js/jquery.dataTables.js')); ?>"></script>
<script src="<?php echo e(asset('js/custom-dataTables.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('template.dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>