<?php $__env->startSection('title'); ?> Dashboard | Home <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<a href="<?php echo e(route('orders')); ?>" class="btn btn-default">Voltar</a><br><br>
<div class="well">

    <?php if($order->cliente): ?>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3>Informações do cliente</h3>
            </div>

            <div class="panel-body">

                <p><strong>Nome: </strong><?php echo e($order->client->name); ?></p>
            </div>
        </div>
    <?php endif; ?>

        <?php if($order->cliente): ?>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3>Informações do vendedor</h3>
                </div>

                <div class="panel-body">
                    <p><strong>Nome: </strong><?php echo e($order->saller->name); ?></p>
                </div>
            </div>
        <?php endif; ?>

    <h3>Informações dos itens da compra</h3>
    <table class="table table-bordered"> 
        <thead>  
            <tr>
                <th>Produto</th>
                <th>Preço</th>
                <th>Fornecedor</th>
                <th>Quantidade</th>
                <th>Total</th>
            </tr>
        </thead>

        <tbody>
            <?php $__currentLoopData = $order->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($item->name); ?></td>
                <td>R$ <?php echo e($item->unit_price); ?></td>
                <td><?php echo e($item->provider->name); ?></td>
                <td><?php echo e($item->pivot->qtd_itens); ?></td>
                <td>R$ <?php echo e($item->pivot->qtd_itens * $item->unit_price); ?></td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
        <tfoot>	
            <tr>
                <td><strong>Total</strong></td>
                <td>R$ <?php echo e($order->total); ?></td>
            </tr>
        </tfoot>
    </table>
    <a href="<?php echo e(route('orders.print', ['id' => $order->id])); ?>" class="btn btn-primary"><i class="fa fa-print"></i> Imprimir</a>
    <a href="<?php echo e(route('orders.download', ['id' => $order->id])); ?>" class="btn btn-success"><i class="fa fa-file"></i> Salvar</a>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('template.dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>