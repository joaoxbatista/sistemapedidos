<?php $__env->startSection('title'); ?> Fonecedor <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="container-fluid">

	<div class="row">
		<div class="col-md-12">
			<hb-provider 
				route-create="<?php echo e(route('admin-dashboard.providers.create')); ?>"
				user_id="<?php echo e(Auth::user()->id); ?>"
			>
			</hb-provider>
		</div>
	</div>

</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?> 

<?php $__env->stopSection(); ?>
<?php echo $__env->make('templates.admin-dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>