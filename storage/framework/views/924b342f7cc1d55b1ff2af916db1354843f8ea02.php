<?php $__env->startSection('title'); ?> Dashboard | Home <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<a href="<?php echo e(route('orders')); ?>" class="btn btn-default">Voltar</a><br><br>

<?php if($order->client): ?>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4>Informações do cliente</h4>
        </div>

        <div class="panel-body">
            <p><strong>Código: </strong><?php echo e($order->client->id); ?></p>
            <p><strong>Nome: </strong><?php echo e($order->client->name); ?></p>
            <p><strong>Limite de crédito: </strong><?php echo e(is_null($order->client->limit_credit) ? "Sem limite" : $order->client->limit_credit); ?></p>
        </div>
    </div>
<?php endif; ?>

<?php if($order->seller): ?>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4>Informações do vendedor</h4>
        </div>

        <div class="panel-body">
            <img class="img-circle" width="70" src="<?php echo e(asset($order->seller->image)); ?>"></img>
            <p><strong>Código: </strong><?php echo e($order->seller->id); ?></p>
            <p><strong>Nome: </strong><?php echo e($order->seller->name); ?></p>
        </div>
    </div>
<?php endif; ?>


<div class="panel panel-default">
    <div class="panel-heading">
        <h4>Informações da Compra</h4>
    </div>
    <div class="panel-body">
        <p><strong>Data da compra:</strong> <?php echo e($order->buy_date); ?></p>
        <?php if($order->status): ?>
            <p><strong>Status:</strong> <span class="label-success label">Pagamento realizado.</span></p>

        <?php elseif(!$order->status and !is_null($order->due_date)): ?>
            <p><strong>Status:</strong> <span class="label-danger label">Parcelas pendentes</span></p>
        <?php else: ?>
            <p><strong>Data de pagamento:</strong> <span class="label-danger label"><?php echo e($order->due_date); ?> </span></p>
        <?php endif; ?>

       

        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Produto</th>
                <th>Preço</th>
                <th>Fornecedor</th>
                <th>Quantidade</th>
                <th>Subtotal</th>
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
                <td></td>
                <td></td>
                <td></td>
                <td><strong>Total</strong></td>
                <td>R$ <?php echo e($order->total); ?></td>
            </tr>
            </tfoot>
        </table>
        <a href="<?php echo e(route('orders.print', ['id' => $order->id])); ?>" class="btn btn-primary"><i class="fa fa-print"></i> Imprimir</a>
        <a href="<?php echo e(route('orders.download', ['id' => $order->id])); ?>" class="btn btn-info"><i class="fa fa-file"></i> Salvar</a>

    </div>
</div>

<?php if($order->type == 'parcels'): ?>
  
    <div class="panel panel-default">   
        <div class="panel-heading"> 
            <h4>Parcelas</h4>
        </div>
        <div class="panel-body"> 

        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Código</th>
                <th>Valor</th>
                <th>Data de Pagamento</th>
                <th width="60px"></th>
            </tr>
            </thead>

            <tbody>
            <?php $__currentLoopData = $order->parcels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $parcel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($parcel->id); ?></td>
                    <td><?php echo e($parcel->value); ?></td>
                    <td><?php echo e($parcel->pay_date); ?></td>
                    <td>

                    

                    <?php if(!$parcel->status): ?>
                        <a href="<?php echo e(route('checks.create', ['id' => $parcel->id])); ?>" class="btn btn-success">Adicionar Cheque</a>
                        <a href="<?php echo e(route('parcel.confirm', ['id' => $parcel->id])); ?>" class="btn btn-success">Pagar</a>
                    <?php else: ?>
                        Pagamento confirmado
                    <?php endif; ?>
                    </td>
                   
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
                
        </div>
    </div>
<?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('template.dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>