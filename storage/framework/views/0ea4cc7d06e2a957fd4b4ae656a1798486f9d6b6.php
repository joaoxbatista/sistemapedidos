<?php $__env->startSection('title'); ?> Estoque <?php $__env->stopSection(); ?>
<?php $__env->startSection('styles'); ?> 

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<a href="<?php echo e(route('admin-dashboard.providers.index')); ?>" class="btn btn-success"><i class="pe-7s-box2"></i> fornecedores</a>

<a href="<?php echo e(route('admin-dashboard.categories.index')); ?>" class="btn btn-success"><i class="pe-7s-ticket"></i> categorias</a>

<a href="<?php echo e(route('admin-dashboard.products.index')); ?>" class="btn btn-success"><i class="pe-7s-shopbag"></i> produtos</a>

<a href="<?php echo e(route('admin-dashboard.orders.index')); ?>" class="btn btn-success"><i class="pe-7s-cart"></i> pedidos</a>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('templates.admin-dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>