<?php $__env->startSection('title'); ?> Pedido <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-12" style="margin-bottom: 10px;">
			<a href="<?php echo e(route('admin-dashboard.orders.create')); ?>" class="btn btn-fill btn-success">Novo pedido</a>
		</div>
		<div class="col-md-12">
			<hb-order-list></hb-order-list>
		</div>
	</div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?> 

<?php $__env->stopSection(); ?>
<?php echo $__env->make('templates.admin-dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>