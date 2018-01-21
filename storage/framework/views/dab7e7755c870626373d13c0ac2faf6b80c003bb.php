<?php $__env->startSection('title'); ?> Configurações do Negócio <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<hb-business-setting></hb-business-setting>
		</div>
	</div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?> 

<?php $__env->stopSection(); ?>
<?php echo $__env->make('templates.admin-dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>