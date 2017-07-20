<?php $__env->startSection('title'); ?> Dashboard | Home <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

    <div class="row">
        <h3>Informações do seu negócio</h3>
        <div class="col-md-3 well">
            <p>Produtos <span class="label label-primary"><?php echo e(App\Models\Product::count()); ?></span></p>
        </div>

        <div class="col-md-3 well">
            <p>Fornecedores <span class="label label-primary"><?php echo e(App\Models\Provider::count()); ?></span></p>
        </div>

        <div class="col-md-3 well">
            <p>Clientes <span class="label label-primary"><?php echo e(App\Models\Client::count()); ?></span></p>
        </div>

        <div class="col-md-3 well">
            <p>Pedidos <span class="label label-primary"><?php echo e(App\Models\Order::count()); ?></span></p>
        </div>

        <div class="col-md-3 well">
            <p>Itens vendidos <span class="label label-primary"><?php echo e(App\Models\Order::sellerItems()); ?></span></p>
        </div>

        <div class="col-md-3 well">
            <p>Saldo de vendas <span class="label label-primary"><?php echo e(App\Models\Order::balance()); ?></span></p>
        </div>

        <div class="col-md-3 well">
            <p>Vendedores <span class="label label-primary"><?php echo e(App\Models\Seller::count()); ?></span></p>
        </div>

    </div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('template.dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>