<?php $__env->startSection('title'); ?> Dashboard | Carrinho <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php echo $__env->make('dashboard.order.menu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php if(count($cart->getItems()) > 0): ?>
<div class="col-md-12">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4>Informações da cliente</h4>
            </div>
            <div class="panel-body">
                <?php if(!is_null($cart->getClient())): ?>
                <a class="btn btn-danger" href="<?php echo e(route('cart.remove.client')); ?>"> Remover</a> <br><br>
                <?php if($cart->getClient() != null): ?>
                <p><strong>Cliente: </strong><?php echo e($cart->getClient()->name); ?></p>

                <?php if($cart->getClient()->limit_credit != null): ?>
                <p><strong>Limite de Crédito: </strong><?php echo e($cart->getClient()->limit_credit); ?></p>
                <?php endif; ?>

                <?php endif; ?>

                <?php else: ?>
                <div class="col-md-3">
                    <?php echo e(Form::open(['method' => 'post', 'route' => 'cart.add.client'])); ?>

                    <div class="form-group">
                        <?php echo e(Form::label('client_id', 'Insira o código do cliente')); ?>

                        <?php echo e(Form::text('client_id', '', ['class' => 'form-control'])); ?>

                    </div>
                    <div style="margin-top: -10px; margin-bottom: 10px;">
                        <?php echo e(Form::submit('Adicionar', ['class' => 'btn btn-primary'])); ?>

                    </div>
                    <?php echo e(Form::close()); ?>

                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

</div>
<?php else: ?>
    <h4>É necessário que exitam produtos no carrinho.</h4>
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script src="<?php echo e(asset('js/jquery.dataTables.js')); ?>"></script>
<script src="<?php echo e(asset('js/custom-dataTables.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('template.dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>