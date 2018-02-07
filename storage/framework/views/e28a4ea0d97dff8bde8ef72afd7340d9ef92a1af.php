<?php $__env->startSection('title'); ?> Dashboard | Home <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

<a href="<?php echo e(route('seller.orders.create')); ?>" class="btn btn-success">Novo <i class="fa fa-plus"></i> </a> <br> <br>

<div class="panel panel-default">
    <div class="panel-heading">
        <h4>Tabela de Pedidos</h4>
    </div>
    <div class="panel-body">
        <div class="table-responsive">
            <table id="data-table" class="table table-bordered">
                <thead>
                    <tr>
                        <th>Data da compra</th>
                        <th>Cliente</th>
                        <th>Total</th>
                        <th class="option-table-header"></th>
                    </tr>
                </thead>

                <tbody>
                    <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($order->buy_date); ?></td>
                        <td>
                            <?php if($order->client): ?>
                            <?php echo e($order->client->name); ?>

                            <?php else: ?>
                            Sem cliente
                            <?php endif; ?>
                        </td>
                        <td>R$ <?php echo e($order->total); ?></td>
                        <td>

                            <ul class="option-table">
                                <li><a href="<?php echo e(route('seller.orders.show', ['id' => $order->id])); ?>" class="opt opt-view"><i class="fa fa-eye"></i></a></li>
                                <li><a href="<?php echo e(route('seller.orders.delete', ['id' => $order->id])); ?>" class="opt opt-delete"><i class="fa fa-trash"></i></a></li>
                            </ul>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('scripts'); ?>
<script src="<?php echo e(asset('js/jquery.dataTables.js')); ?>"></script>
<script src="<?php echo e(asset('js/custom-dataTables.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('template.seller-dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>