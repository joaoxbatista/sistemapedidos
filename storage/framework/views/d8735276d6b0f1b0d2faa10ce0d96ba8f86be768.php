<?php $__env->startSection('title'); ?> Dashboard <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <div class="col-md-2 card">
        <h3><i class="pe-7s-ticket"></i> <?php echo e(App\Models\Product::count()); ?></h3>
        <p>produtos</p>
    </div>

    <div class="col-md-2 card">
        <h3><i class="pe-7s-box2"></i> <?php echo e(App\Models\Provider::count()); ?> </h3>
        <p>fornecedores</p>
    </div>

    <div class="col-md-2 card">
        <h3><i class="pe-7s-users"></i> <?php echo e(App\Models\Client::count()); ?> </h3>
        <p>clientes</p>
    </div>

    <div class="col-md-2 card">
        <h3><i class="pe-7s-cart"></i> <?php echo e(App\Models\Order::count()); ?> </h3>
        <p>pedidos</p>
    </div>

    <div class="col-md-2 card">
        <h3><i class="pe-7s-cash"></i> <?php echo e(App\Models\Order::balance()); ?> </h3>
        <p>saldo</p>
    </div>

    <div class="col-md-2 card">
        <h3><i class="pe-7s-id"></i> <?php echo e(App\Models\Seller::count()); ?> </h3>
        <p>funcionários</p>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?> 

<?php $__env->stopSection(); ?>

<?php echo $__env->make('templates.admin-dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>