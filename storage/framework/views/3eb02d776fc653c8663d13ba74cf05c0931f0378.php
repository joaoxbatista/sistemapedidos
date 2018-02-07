<?php $__env->startSection('title'); ?> Dashboard | Home <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

<a href="<?php echo e(route('dashboard.home')); ?>" class="btn btn-default">Voltar</a>
<a href="<?php echo e(route('orders.create')); ?>" class="btn btn-success">Novo <i class="fa fa-plus"></i> </a> <br> <br>

<div class="panel panel-default">
    <div class="panel-heading">
        <h4>Tabela de pedidos</h4>
    </div>
    <div class="panel-body">
        <div class="table-responsive">
            <table id="data-table" class="table table-bordered">

                <thead>
                <tr>
                    <th width="40px">Código</th>
                    <th>Data da compra</th>
                    <th>Cliente</th>
                    <th>Total</th>
                    <th width="100px"></th>
                </tr>
                </thead>

                <tbody>
                <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td style="color: white; font-weight: bold;"
                        <?php if($order->status): ?>
                            class="label-success"
                        <?php else: ?>
                            class="label-danger"
                        <?php endif; ?>
                        >
                            <?php echo e($order->id); ?>

                        </td>
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
                                <li><a href="/dashboard/orders/<?php echo e($order->id); ?>" class="opt opt-view"><i class="fa fa-eye"></i></a></li>
                                
                                <li><a href="/dashboard/orders/<?php echo e($order->id); ?>/delete" class="opt opt-delete"><i class="fa fa-trash"></i></a></li>
                            </ul>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('scripts'); ?>
<script src="<?php echo e(asset('js/jquery.dataTables.js')); ?>"></script>
<script src="<?php echo e(asset('js/custom-dataTables.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('template.dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>