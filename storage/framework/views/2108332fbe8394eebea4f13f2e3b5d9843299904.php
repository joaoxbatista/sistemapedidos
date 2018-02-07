<?php $__env->startSection('title'); ?> Estoque <?php $__env->stopSection(); ?>
<?php $__env->startSection('styles'); ?> 

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div class="row">
	<div class="col-md-6">
		<hb-provider></hb-provider>
	</div>

	<div class="col-md-6">
		<hb-category></hb-category>
	</div>
</div>

<div class="row">
	<div class="col-md-12">
		<hb-product></hb-product>
	</div>
</div>



<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('templates.admin-dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>