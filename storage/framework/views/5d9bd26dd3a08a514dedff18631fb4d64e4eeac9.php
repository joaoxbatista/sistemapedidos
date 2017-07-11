<?php $__env->startSection('title'); ?> Dashboard | Home <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<a href="/dashboard/products/" class="btn btn-default">Voltar</a><br><br>

<div class="container">
	<div class="col-md-12">
		<p><strong>Nome: </strong><?php echo e($product->name); ?></p>
		<img src="<?php echo e(asset('uploads/images/products/'.$product->image)); ?>" alt="<?php echo e($product->name); ?>">
		<p><strong>Preço unitário: </strong><?php echo e($product->unit_price); ?></p>
		<p><strong>Validade: </strong><?php echo e($product->expiration); ?></p>
		<p><strong>Peso: </strong><?php echo e($product->weight); ?>Kg</p>
		<p><strong>Descrição: </strong><?php echo e($product->desc); ?></p>
		<p><strong>Fornecedor: </strong><?php echo e($product->provider->name); ?></p>
	</div>
</div>




<?php $__env->stopSection(); ?>
<?php echo $__env->make('template.dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>